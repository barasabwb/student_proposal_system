<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProposalProgress;
use App\students\File;
use App\students\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;


class FileController extends Controller
{

    public function index(){
        $files= File::all()->where('approval', 'pending')->sortByDesc('created_at');

        return view('admin.files', compact('files'));
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,zip|max:80000',
            'description' => ['required', 'string', 'max:255','min:20'],
            'thesis' => ['required', 'string', 'max:255']
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
            $fileModel->description = $req->input('description');
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
    public function show($id){
        $file = File::find($id);
        $file_revisions = Revision::all()->where('file_id',$id)->sortByDesc('created_at');
        return view('admin.file_details',compact('file','file_revisions'));
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

}
