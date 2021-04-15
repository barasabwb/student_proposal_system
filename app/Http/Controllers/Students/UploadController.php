<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\students\File;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,zip|max:2048'
        ]);

        $fileModel = new File();

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads/'.auth()->user()->username, $fileName, 'public');

            $fileModel->file_name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->original_file_name = $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->username = auth()->user()->username;
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
