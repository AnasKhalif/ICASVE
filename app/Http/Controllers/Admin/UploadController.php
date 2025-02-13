<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();
        return view('upload.index', compact('uploads'));
    }

    public function store(Request $request)
    {
        $mimeTypes = [
            'letter_header' => 'png',
            'signature' => 'jpg',
            'certificate_presenter' => 'pdf',
            'certificate_participant' => 'pdf',
        ];

        $request->validate([
            'type' => 'required|in:' . implode(',', array_keys($mimeTypes)),
            'file' => 'required|mimes:' . $mimeTypes[$request->type] . '|max:2048',
        ]);

        // Simpan file
        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');

        Upload::updateOrCreate(
            ['type' => $request->type],
            ['file_path' => $filePath]
        );

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }


    public function show($type)
    {
        $upload = Upload::where('type', $type)->first();
        if (!$upload) {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }

        return redirect(Storage::url($upload->file_path));
    }
}
