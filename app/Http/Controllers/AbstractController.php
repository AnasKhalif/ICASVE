<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\Symposium;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FullPaper;
use setasign\Fpdi\Fpdi;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Upload;
use App\Models\ConferenceSetting;
use Illuminate\Support\Facades\File;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use App\Models\Year;

class AbstractController extends Controller
{
    use HasRolesAndPermissions;
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abstracts = AbstractModel::with(['symposium', 'fullPaper.fullPaperReviews.reviewer', 'user.filePayment', 'reviewers'])
            ->where('user_id', Auth::id())
            ->paginate(10);
        $conferenceSetting = ConferenceSetting::first();
        $openAbstractSubmission = $conferenceSetting->open_abstract_submission ?? false;
        $openFullPaperUpload = $conferenceSetting->open_full_paper_upload ?? false;
        return view('abstracts.index', compact('abstracts', 'openAbstractSubmission', 'openFullPaperUpload'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            if (
                request()->user()->hasRole('indonesia-presenter') ||
                request()->user()->hasRole('foreign-presenter')
            ) {
                $conferenceSetting = ConferenceSetting::first();
                if (!$conferenceSetting || !$conferenceSetting->open_abstract_submission) {
                    return redirect()->route('abstracts.index')->with($this->alertAbstractClosed());
                }
                $maxAbstracts = $conferenceSetting->max_abstracts_per_participant;
                $currentAbstracts = AbstractModel::where('user_id', Auth::id())->count();

                if ($currentAbstracts >= $maxAbstracts) {
                    return redirect()->route('abstracts.index')->with($this->alertAbstractLimit("You have reached the maximum limit of $maxAbstracts abstracts."));
                }
                $activeYear = Year::where('is_active', true)->first();
                $symposiums = Symposium::whereYear('created_at', $activeYear->year)->get();
                return view('abstracts.create', compact('symposiums'));
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertAbstractClosed());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_abstract_submission) {
            return redirect()->route('abstracts.index')->with($this->alertAbstractClosed());
        }

        $maxAbstracts = $conferenceSetting->max_abstracts_per_participant;
        $currentAbstracts = AbstractModel::where('user_id', Auth::id())->count();

        if ($currentAbstracts >= $maxAbstracts) {
            return redirect()->route('abstracts.index')->with('error', "You have reached the maximum limit of $maxAbstracts abstracts.");
        }

        $maxWords = $conferenceSetting->max_words_in_abstract_body;

        $abstractWordCount = str_word_count($request->abstract);

        if ($abstractWordCount > $maxWords) {
            return redirect()->back()->withInput()->withErrors(['abstract' => "Abstract must not exceed $maxWords words. Currently: $abstractWordCount words."]);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required',
            'affiliations' => 'required',
            'corresponding_email' => 'required|email',
            'abstract' => 'required',
            'keyword' => 'required',
            'presentation_type' => 'required|in:Oral presentation,Poster presentation',
            'publication' => 'required|in:Journal Publication,International Indexed Proceedings',
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        $abstract = AbstractModel::create([
            'user_id' => Auth::id(),
            'symposium_id' => $request->symposium_id,
            'title' => $request->title,
            'authors' => $request->authors,
            'affiliations' => $request->affiliations,
            'corresponding_email' => $request->corresponding_email,
            'abstract' => $request->abstract,
            'keyword' => $request->keyword,
            'presentation_type' => $request->presentation_type,
            'publication' => $request->publication,
            'status' => 'open',
        ]);

        $this->generateCertificate($abstract);

        return redirect()->route('abstracts.index')->with($this->alertCreated());
    }

    public function generateCertificate(AbstractModel $abstract)
    {
        $user = $abstract->user;
        $role = $user->roles->first()->name;

        $templateUrl = Upload::getFilePath('certificate_presenter');
        $templatePath = storage_path('app/public/' . str_replace(asset('storage/'), '', $templateUrl));

        if (!file_exists($templatePath)) {
            throw new \Exception('Certificate template not found');
        }


        $pdf = new Fpdi();
        $pdf->setSourceFile($templatePath);

        $template = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($template);
        $pdf->addPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($template);

        $pdf->SetFont('Times', 'B', 45);

        $nameWidth = $pdf->GetStringWidth($user->name);
        $nameX = ($size['width'] - $nameWidth) / 2;
        $pdf->SetXY($nameX, 150);
        $pdf->Write(0, $user->name);

        $pdf->Line($nameX, 155, $nameX + $nameWidth, 155);

        $roleText = ($abstract->presentation_type == "Oral presentation") ? "Oral presenter" : "Poster presenter";

        $roleWidth = $pdf->GetStringWidth($roleText);
        $roleX = ($size['width'] - $roleWidth) / 2;
        $pdf->SetXY($roleX, 195);
        $pdf->Write(0, $roleText);


        $pdf->SetFont('Times', 'I', 35);
        $pdf->SetXY(30, 230);
        $pdf->MultiCell($size['width'] - 60, 20, $abstract->title, 0, 'C');

        Storage::disk('public')->makeDirectory('certificates');
        $certificateName = Str::random(20) . '.pdf';
        $certificatePath = 'certificates/' . $certificateName;
        $pdf->Output(storage_path('app/public/' . $certificatePath), 'F');

        Certificate::create([
            'user_id' => $user->id,
            'certificate_type' => 'presenter',
            'certificate_path' => $certificatePath,
        ]);
    }

    public function viewCertificate($encryptedId, $type)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return abort(404);
        }

        $abstract = AbstractModel::with('user')->findOrFail($id);
        $certificate = Certificate::where('user_id', $abstract->user_id)
            ->where('certificate_type', $type)
            ->first();

        if ($certificate) {
            return response()->file(storage_path('app/public/' . $certificate->certificate_path));
        } else {
            return redirect()->route('abstracts.show', $id)->with('error', 'Certificate not generated yet.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(AbstractModel $abstract)
    {
        try {
            if (
                $abstract->user_id === request()->user()->id
            ) {
                $formattedAuthors = $this->formatAuthors($abstract->authors);
                $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
                return view('abstracts.detail', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertNotFound());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbstractModel $abstract)
    {
        try {
            $activeYear = Year::where('is_active', true)->first();
            $symposiums = Symposium::whereYear('created_at', $activeYear->year)->get();
            if (
                $abstract->user_id === request()->user()->id
            ) {
                if (!in_array($abstract->status, ['open', 'revision'])) {
                    return back()->with($this->alertAbstractNotEdit());
                }
                return view('abstracts.edit', compact('abstract', 'symposiums'));
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbstractModel $abstract)
    {
        try {
            if (
                $abstract->user_id === request()->user()->id
            ) {
                if (!in_array($abstract->status, ['open', 'revision'])) {
                    return back()->with($this->alertAbstractNotEdit());
                }

                $request->validate([
                    'title' => 'required',
                    'authors' => 'required',
                    'affiliations' => 'required',
                    'corresponding_email' => 'required|email',
                    'abstract' => 'required',
                    'keyword' => 'required',
                    'presentation_type' => 'required|in:Oral presentation,Poster presentation',
                    'publication' => 'required|in:Journal Publication,International Indexed Proceedings',
                    'symposium_id' => 'required|exists:symposiums,id',
                ]);

                $abstract->update($request->only([
                    'title', 'authors', 'affiliations', 'corresponding_email', 'abstract', 'keyword', 'presentation_type', 'symposium_id', 'publication'
                ]));

                return redirect()->route('abstracts.index')->with($this->alertUpdated());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alrtNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbstractModel $abstract)
    {
        try {
            if (
                $abstract->user_id === request()->user()->id
            ) {
                if ($abstract->status != 'open') {
                    return back()->with($this->alertAbstractNotDelete());
                }
                $user = $abstract->user;
                $certificate = $user->certificates()->where('certificate_type', 'presenter')->first();

                if ($certificate) {
                    $certificatePath = $certificate->certificate_path;
                    if (Storage::disk('public')->exists($certificatePath)) {
                        Storage::disk('public')->delete($certificatePath);
                    }
                    $certificate->delete();
                }

                if ($abstract->fullPaper) {
                    $fullPaperPath = $abstract->fullPaper->file_path;

                    if (Storage::disk('public')->exists($fullPaperPath)) {
                        Storage::disk('public')->delete($fullPaperPath);
                    } else {
                        dd("File tidak ditemukan: " . $fullPaperPath);
                    }

                    $abstract->fullPaper->delete();
                }
                $abstract->delete();

                return redirect()->route('abstracts.index')->with($this->alertDeleted());
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertNotFound());
        }
    }



    private function formatAuthors($authors)
    {
        return preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $authors);
    }


    private function formatAffiliations($affiliations)
    {
        $formattedAffiliations = preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $affiliations);
        return nl2br($formattedAffiliations);
    }

    public function downloadPdf($id)
    {
        try {
            $abstract = AbstractModel::with('symposium')->findOrFail($id);
            if (
                $abstract->user_id === request()->user()->id
            ) {
                $formattedAuthors = $this->formatAuthors($abstract->authors);
                $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);

                $pdf = PDF::loadView('abstracts.pdf', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));

                return $pdf->stream('abstract-detail.pdf');
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertNotFound());
        }
    }

    public function acceptancePdf($id)
    {
        try {
            $abstract = AbstractModel::with(['user'])->findOrFail($id);
            if (
                $abstract->user_id === request()->user()->id
            ) {
                $conferenceSetting = ConferenceSetting::first();
                $conferenceChairPerson = $conferenceSetting->conference_chairperson;
                $letterHeaderUrl = Upload::getFilePath('letter_header');
                $signatureUrl = Upload::getFilePath('signature');

                $letterHeader = storage_path('app/public/' . str_replace(asset('storage/'), '', $letterHeaderUrl));
                $signature = storage_path('app/public/' . str_replace(asset('storage/'), '', $signatureUrl));

                $pdf = PDF::loadView('abstracts.acceptance', compact('abstract', 'letterHeader', 'signature', 'conferenceChairPerson'));

                return $pdf->stream('abstract-acceptance.pdf');
            } else {
                return redirect()->route('abstracts.index')->with($this->permissionDenied());
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('abstracts.index')->with($this->alertNotFound());
        }
    }
}
