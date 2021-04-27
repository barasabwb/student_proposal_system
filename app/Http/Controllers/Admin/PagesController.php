<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProposalProgress;
use App\students\File;
use App\students\Revision;
use App\User;

class PagesController extends Controller
{
    public function showSupervisors(){

        $supervisors = User::all()->where('role','supervisor');
        return view('admin.supervisors', compact('supervisors'));

}
    public function showStudents(){

        $students= User::all()->where('role','student');
        return view('admin.students', compact('students'));

    }
    public function openUserForm(){


        return view('admin.user_form');

    }
    public function showApprovedFiles(){
        $accepted = ProposalProgress::all();


        return view('admin.progress')->with(compact('accepted'));

    }
    public function showRejectedFiles(){
        $files= File::all()->where('approval', 'rejected')->sortByDesc('created_at');

        return view('admin.rejected_files', compact('files'));
    }
    public function openAcceptedDetails($id){
        $details = ProposalProgress::find($id);
        $file_revisions = Revision::all()->where('file_id',$details->file_id);


        return view('admin.progress_details', compact('details','file_revisions'));
    }




}
