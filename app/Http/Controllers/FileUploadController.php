<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    public function uploadFiles(Request $request)
    {

        // dd($request->all());
        // die;
        $this->validate($request, [
            'uploadedFiles.*' => 'required|file|max:10240' // Limit of 10 MB per file
        ]);

        $files = $request->file('uploadedFiles');
        $uploadedFilesData = [];

        foreach ($files as $file) {
            $filename = Auth::id() . '_' . time() . '_' . $file->getClientOriginalName();
            $path = '/uploads/files/' . $filename;

            // Move the uploaded file to the desired location
            $file->move(public_path('uploads/files'), $filename);

            // dd($path); die;
            $uploadedFile = UploadedFile::create([
                'user_id' => Auth::id(),
                'filename' => $filename,
                'path' => $path
            ]);

            $uploadedFilesData[] = ['name' => $filename, 'path' => $path];
        }

        return response()->json(['message' => 'Files uploaded successfully!', 'files' => $uploadedFilesData]);
    }
}
