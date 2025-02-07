<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\FilePayment;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with('user.filePayment')->paginate(10);
        return view('certificates.index', compact('certificates'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->status = $request->status;
        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Status certificate updated.');
    }
}
