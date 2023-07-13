<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadController extends Controller
{
    public function index()
    {
        return View::make('files.index');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('rar_file')) {
            $file = $request->file('rar_file');
            $fileName = $file->getClientOriginalName();

            // Move the uploaded file to a desired location
            $file->move('uploads', $fileName);

            // Store the file details in the database
            $fileRecord = new File();
            $fileRecord->name = $fileName;
            $fileRecord->path = 'uploads/' . $fileName;
            $fileRecord->save();

            return "File uploaded and record inserted successfully.";
        }

        return "No file uploaded.";
    }

    public function viewFiles()
    {
        $files = File::all();

        return view('files.index', compact('files'));
    }
}
