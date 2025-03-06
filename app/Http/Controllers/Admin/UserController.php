<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use App\Models\AbstractModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Upload;
use App\Models\Year;
use App\Models\ConferenceSetting;
use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use App\Models\Certificate;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $rolesToDisplay = ['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'];

        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }

        $totalUsers = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $usersWithAbstracts = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->whereHas('abstracts')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $search = $request->query('search');

        $users = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })
            ->whereYear('created_at', $activeYear->year)
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })->with('roles')->paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'users' => $users->items(),
                'pagination' => (string) $users->links(),
            ]);
        }

        return view('participants.index', compact('users', 'totalUsers', 'usersWithAbstracts'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::whereIn('name', [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants'
        ])->get();
        $conferenceSetting = ConferenceSetting::first();
        return view('participants.create', compact('roles', 'conferenceSetting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'institution' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15', 'regex:/^[0-9\-\+\(\)\s]*$/'],
            'attendance' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:255'],
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'institution' => $validatedData['institution'],
            'job_title' => $validatedData['job_title'],
            'phone_number' => $validatedData['phone_number'],
            'attendance' => $validatedData['attendance'],
            'country' => $validatedData['country'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $role = Role::find($validatedData['role_id']);

        $user->roles()->attach($role);
        $this->generateCertificate($user);

        return redirect()->route('admin.participant.index')->with($this->alertCreated());
    }

    private function generateCertificate(User $user)
    {
        // Tentukan template sertifikat untuk peserta
        $templateUrl = Upload::getFilePath('certificate_participant');
        $templatePath = storage_path('app/public/' . str_replace(asset('storage/'), '', $templateUrl));

        if (!file_exists($templatePath)) {
            throw new \Exception('Certificate template not found');
        }

        // Inisialisasi FPDI
        $pdf = new Fpdi();
        $pdf->setSourceFile($templatePath);
        $template = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($template);
        $pdf->addPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($template);

        // Menambahkan teks ke dalam template sertifikat
        $pdf->SetFont('Times', 'B', 45); // Gunakan font Times New Roman atau Helvetica

        // Menentukan posisi untuk nama penerima dan menambahkan garis bawah
        $nameWidth = $pdf->GetStringWidth($user->name);
        $nameX = ($size['width'] - $nameWidth) / 2;  // Memusatkan nama
        $pdf->SetXY($nameX, 150);  // Koordinat untuk nama penerima
        $pdf->Write(0, $user->name);

        // Menambahkan garis bawah pada nama
        $pdf->Line($nameX, 155, $nameX + $nameWidth, 155);  // Garis bawah untuk nama

        // Menambahkan teks untuk institusi
        $participantText = "Participant";  // Teks yang ingin ditampilkan
        $participantWidth = $pdf->GetStringWidth($participantText);
        $participantX = ($size['width'] - $participantWidth) / 2;  // Memusatkan teks
        $pdf->SetXY($participantX, 200);  // Koordinat untuk teks
        $pdf->Write(0, $participantText);

        // Menyimpan PDF ke storage
        Storage::disk('public')->makeDirectory('certificates');
        $certificateName = Str::random(20) . '.pdf';  // Hash nama file
        $certificatePath = 'certificates/' . $certificateName;
        $pdf->Output(storage_path('app/public/' . $certificatePath), 'F');

        // Menyimpan path sertifikat ke database
        Certificate::create([
            'user_id' => $user->id,
            'certificate_type' => 'participant',
            'certificate_path' => $certificatePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('abstracts.fullpaper', 'filePayment')->findOrFail($id);
        return view('participants.detail', compact('user'));
    }

    public function showAbstract($id)
    {
        $abstract = AbstractModel::with('symposium')->findOrFail($id);
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);

        return view('participants.detail-abstract', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));
    }

    public function downloadAbstractPdf($id)
    {
        $abstract = AbstractModel::with('symposium')->findOrFail($id);
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);

        $pdf = Pdf::loadView('participants.pdf', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));

        return $pdf->stream('abstract-detail.pdf');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::whereIn('name', [
                'indonesia-presenter',
                'foreign-presenter',
                'indonesia-participants',
                'foreign-participants'
            ])->get();

            return view('participants.edit', compact('user', 'roles'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'institution' => ['required', 'string', 'max:255'],
                'job_title' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:15', 'regex:/^[0-9\-\+\(\)\s]*$/'],
                'attendance' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'role_id' => ['required']
            ]);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'institution' => $validatedData['institution'],
                'job_title' => $validatedData['job_title'],
                'phone_number' => $validatedData['phone_number'],
                'attendance' => $validatedData['attendance'],
                'country' => $validatedData['country']
            ]);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

            $role = Role::find($validatedData['role_id']);

            $user->roles()->attach($role);

            return redirect()->route('admin.participant.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            foreach ($user->abstracts as $abstract) {
                if ($abstract->fullPaper) {
                    $fullPaperPath = $abstract->fullPaper->file_path;
                    if (Storage::disk('public')->exists($fullPaperPath)) {
                        Storage::disk('public')->delete($fullPaperPath);
                    }
                    $abstract->fullPaper->delete();
                }

                $abstract->delete();
            }

            foreach ($user->certificates as $certificate) {
                $certificatePath = $certificate->certificate_path;
                if (Storage::disk('public')->exists($certificatePath)) {
                    Storage::disk('public')->delete($certificatePath);
                }
                $certificate->delete();
            }

            $user->roles()->detach();

            $user->delete();

            return redirect()->route('admin.participant.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }


    public function acceptancePdf($id)
    {
        $conferenceSetting = ConferenceSetting::first();
        $conferenceChairPerson = $conferenceSetting->conference_chairperson;
        $abstract = AbstractModel::with('user')->findOrFail($id);

        $letterHeaderUrl = Upload::getFilePath('letter_header');
        $signatureUrl = Upload::getFilePath('signature');

        $letterHeader = storage_path('app/public/' . str_replace(asset('storage/'), '', $letterHeaderUrl));
        $signature = storage_path('app/public/' . str_replace(asset('storage/'), '', $signatureUrl));

        $pdf = PDF::loadView('participants.acceptance', compact('abstract', 'letterHeader', 'signature', 'conferenceChairPerson'));

        return $pdf->stream('abstract-acceptance.pdf');
    }
    public function exportExcel()
    {
        return Excel::download(new ParticipantsExport, 'participants.xlsx');
    }
}
