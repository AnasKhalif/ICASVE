<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Upload;
use App\Models\ConferenceSetting;
use Illuminate\Support\Facades\File;
use App\Models\Country;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $role = Role::whereIn('name', [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants'
        ])->get();
        $conferenceSetting = ConferenceSetting::first();
        $openRegistration = $conferenceSetting->open_registration ?? false;
        $conferenceTitle = optional($conferenceSetting)->conference_title ?? 'The 3rd International Conference on Applied Science for Vocational Education';
        $conferenceAbbreviation = optional($conferenceSetting)->conference_abbreviation ?? 'ICASVE2025';
        $logo = Upload::where('type', 'logo')->latest()->first();
        $logoPath = $logo ? asset('storage/' . $logo->file_path) : asset('img/Logo_ICASVE_rmbg.png');
        $countries = Country::orderBy('name', 'asc')->get();
        return view('auth.register', compact('role', 'openRegistration', 'conferenceTitle', 'conferenceAbbreviation', 'conferenceSetting', 'logoPath', 'countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_registration) {
            return redirect()->route('register')->with('error', 'Registration Closed.');
        }

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'institution' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15', 'regex:/^[0-9\-\+\(\)\s]*$/'],
            'attendance' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
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

        event(new Registered($user));

        $conference = ConferenceSetting::first();

        $details = [
            'name' => $validatedData['name'],
            'institution' => $validatedData['institution'],
            'job_title' => $validatedData['job_title'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'registration_type' => $role->display_name,
            'conference_title' => $conference->conference_title,
            'password' => $validatedData['password'],
        ];

        Mail::to($validatedData['email'])->send(new RegistrationConfirmation($details));
        $this->generateCertificate($user);

        return redirect(route('login'))->with('success', 'Registration successful. A confirmation email has been sent.');
    }

    public function generateCertificate(User $user)
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
}
