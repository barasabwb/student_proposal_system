<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\students\File;
use App\students\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;


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
            $fileModel->thesis = $req->input('thesis');
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
    public function show($id){
        $viewed_file = File::find($id);
        $file_revisions = Revision::all()->where('original_file_id',$id)->sortByDesc('created_at');
        return view('students.file_details', compact('viewed_file','file_revisions'));
    }
    public function destroy($id){
        $to_delete = File::find($id);
        $file_revisions_to_del = Revision::all()->where('original_file_id',$id);
        foreach ($file_revisions_to_del as $file){
            Storage::delete('public/uploads/'.auth()->user()->username.'/'.$file->revision_file);
            try {
                $file->delete();
            } catch (\Exception $e) {
            }

        }


        Storage::delete('public/uploads/'.auth()->user()->username.'/'.$to_delete->file_name);

        $to_delete->delete();
        return redirect('students/myproposals')->with('success', 'document deleted!');


    }
    public function addRevision(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,zip|max:80000',
            'revision_comment' => ['required', 'string', 'max:255']
        ]);

        $revisionModel = new Revision();
        $id = $req->input('file_id');

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads/'.auth()->user()->username, $fileName, 'public');

//            $revisionModel->file_name = time().'_'.$req->file->getClientOriginalName();
            $withExt = $req->file->getClientOriginalName();
            $revisionModel->original_file_id = $id;
            $revisionModel->revision_name = pathinfo($withExt, PATHINFO_FILENAME);;
            $revisionModel->revision_file = '/storage/' . $filePath;
            $revisionModel->revision_comment = $req->input('revision_comment');
            $revisionModel->save();

            return back()
                ->with('success','Revision has been uploaded.')
                ->with('file', $fileName);
        }



    }
}
