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
            return back()->with('error', 'No active year set.');
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
            })->with('roles')->paginate(10);

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
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'institution' => $validatedData['institution'],
            'job_title' => $validatedData['job_title'],
            'phone_number' => $validatedData['phone_number'],
            'attendance' => $validatedData['attendance'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $role = Role::find($validatedData['role_id']);

        $user->roles()->attach($role);

        return redirect()->route('admin.participant.index')->with($this->alertCreated());
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
                'role_id' => ['required']
            ]);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'institution' => $validatedData['institution'],
                'job_title' => $validatedData['job_title'],
                'phone_number' => $validatedData['phone_number'],
                'attendance' => $validatedData['attendance']
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

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

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

        $letterHeader = public_path(str_replace(asset(''), '', $letterHeaderUrl));
        $signature = public_path(str_replace(asset(''), '', $signatureUrl));

        $pdf = PDF::loadView('participants.acceptance', compact('abstract', 'letterHeader', 'signature', 'conferenceChairPerson'));

        return $pdf->stream('abstract-acceptance.pdf');
    }
}
