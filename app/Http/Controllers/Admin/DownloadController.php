<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\FilePayment;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        return view('download.index');
    }

    public function downloadFullPaper()
    {
        $fullPapers = FullPaper::where('status', 'verified')->get();

        if ($fullPapers->isEmpty()) {
            return back()->with('error', 'No verified full papers available for download.');
        }

        $zipFileName = 'verified_full_papers.zip';
        $zip = new ZipArchive;

        $zipPath = storage_path('app/public/' . $zipFileName);
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($fullPapers as $paper) {
                $filePath = storage_path('app/public/' . $paper->file_path);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Download all verified payment proofs as a ZIP file.
     */
    public function downloadPaymentProof()
    {
        $paymentProofs = FilePayment::where('status', 'verified')->get();

        if ($paymentProofs->isEmpty()) {
            return back()->with('error', 'No verified payment proofs available for download.');
        }

        $zipFileName = 'verified_payment_proofs.zip';
        $zip = new ZipArchive;

        $zipPath = storage_path('app/public/' . $zipFileName);
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($paymentProofs as $proof) {
                $filePath = storage_path('app/public/' . $proof->file_path);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
