<?php


namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use App\ProposalProgress;
use App\students\File;
use App\students\Revision;


class PagesController extends Controller
{
    public function openUploadForm()
    {

        return view('students.upload');
    }
    public function openMyProposals(){
        $my_files= File::all()->where('username', auth()->user()->username)->sortByDesc('created_at');

        return view('students.my_proposals', compact('my_files'));
    }
    public function openMyAcceptedProposals(){
        $my_accepted_files= ProposalProgress::all()->where('student_id', auth()->user()->id)->sortByDesc('created_at');

        return view('students.progess', compact('my_accepted_files'));
    }
    public function openAcceptedDetails($id){
        $details = ProposalProgress::find($id);
        $file_revisions = Revision::all()->where('file_id',$details->file_id)->sortByDesc('created_at');


        return view('students.progress_details', compact('details','file_revisions'));
    }


}
