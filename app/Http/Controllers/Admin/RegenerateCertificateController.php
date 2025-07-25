<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AbstractController;

class RegenerateCertificateController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', [
                'indonesia-participants',
                'foreign-participants',
                'indonesia-presenter',
                'foreign-presenter'
            ]);
        })
            ->orderBy('created_at', 'asc')
            ->paginate(50);

        return view('regenerate-certificate.index', compact('users'));
    }


    public function regenerateCertificate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        foreach ($user->certificates as $certificate) {
            if (Storage::disk('public')->exists($certificate->certificate_path)) {
                Storage::disk('public')->delete($certificate->certificate_path);
            }
            $certificate->delete();
        }

        $registeredController = new RegisteredUserController();
        $registeredController->generateCertificate($user);

        if ($user->hasRole('indonesia-presenter') || $user->hasRole('foreign-presenter')) {
            $abstract = $user->abstracts()->latest()->first();

            if ($abstract) {
                $abstractController = new AbstractController();
                $abstractController->generateCertificate($abstract);
            }
        }

        return redirect()->back()->with('success', 'Certificate regenerated successfully for ' . $user->name);
    }
}
