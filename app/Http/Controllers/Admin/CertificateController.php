<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\FilePayment;
use App\Models\Year;

class CertificateController extends Controller
{
    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'No active year set.');
        }
        $certificates = Certificate::with('user.filePayment')
            ->whereYear('created_at', $activeYear->year)
            ->paginate(10);
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
