<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\FilePayment;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use App\Models\Year;

class DownloadController extends Controller
{
    public function index()
    {
        return view('download.index');
    }

    public function downloadFullPaper()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'No active year set.');
        }

        $fullPapers = FullPaper::where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->whereHas('abstract', function ($query) {
                $query->whereHas('user', function ($subQuery) {
                    $subQuery->whereHas('filePayment', function ($paymentQuery) {
                        $paymentQuery->where('status', 'verified');
                    });
                });
            })
            ->get();

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

    
    public function downloadPaymentProof()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'No active year set.');
        }

        $paymentProofs = FilePayment::where('status', 'verified')
            ->whereYear('created_at', $activeYear->year)
            ->get();

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
