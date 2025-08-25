<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use App\Models\Year;
use App\Traits\FlashAlert;

class UploadController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }
        $uploads = Upload::whereYear('created_at', $activeYear->year)->get();
        return view('upload.index', compact('uploads'));
    }

    public function store(Request $request)
    {
        $mimeTypes = [
            'letter_header' => 'png',
            'signature' => 'jpg',
            'certificate_presenter' => 'pdf',
            'certificate_participant' => 'pdf',
            'logo' => 'png,jpg',
            'commitment_letter' => 'docx',
        ];

        $request->validate([
            'type' => 'required|in:' . implode(',', array_keys($mimeTypes)),
            'file' => 'required|mimes:' . $mimeTypes[$request->type] . '|max:5120',
            'logo' => 'nullable|mimes:png,jpg|max:5120'
        ]);

        // Simpan file
        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');

        Upload::updateOrCreate(
            ['type' => $request->type],
            ['file_path' => $filePath],
        );

        return redirect()->back()->with($this->alertCreated());
    }


    public function show($type)
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return redirect()->back()->with($this->alertDanger());
        }

        $upload = Upload::where('type', $type)
            ->whereYear('created_at', $activeYear->year)
            ->first();
        if (!$upload) {
            return redirect()->back()->with($this->alertNotFound());
        }

        return redirect(Storage::url($upload->file_path));
    }
}
