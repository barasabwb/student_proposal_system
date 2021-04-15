<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\students\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{

    public function index(){
        $my_files= File::all()->where('username', auth()->user()->username)->sortByDesc('created_at');

        return view('students.my_proposals', compact('my_files'));
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,zip|max:80000'
        ]);

        $fileModel = new File();

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads/'.auth()->user()->username, $fileName, 'public');

            $fileModel->file_name = time().'_'.$req->file->getClientOriginalName();
            $withExt = $req->file->getClientOriginalName();
            $fileModel->original_file_name = pathinfo($withExt, PATHINFO_FILENAME);;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->username = auth()->user()->username;
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
    public function show($id){
        $viewed_file = File::find($id);
        return view('students.file_details', compact('viewed_file'));
    }
    public function destroy($id){
        $to_delete = File::find($id);
        Storage::delete('public/uploads/'.auth()->user()->username.'/'.$to_delete->file_name);
        $to_delete->delete();
        return redirect('students/myproposals')->with('success', 'document deleted!');


    }
    public function addRevision($id){
        $to_update = File::find($id);


    }
}
