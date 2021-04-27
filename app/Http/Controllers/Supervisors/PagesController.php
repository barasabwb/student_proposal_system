<?php


namespace App\Http\Controllers\Supervisors;
use App\ProposalProgress;
use App\students\File;
use App\students\Revision;
use App\SupervisorComments;


class PagesController extends \App\Http\Controllers\Controller
{

    public function openMyAssignedProposals(){
        $accepted_files= ProposalProgress::all()->where('supervisor_id', auth()->user()->id)->sortByDesc('created_at');

        return view('supervisors.approved_files', compact('accepted_files'));
    }
    public function openAcceptedDetails($id){
        $details = ProposalProgress::find($id);
        $file_revisions = Revision::all()->where('file_id',$details->file_id);
        $comments = SupervisorComments::all()->where('file_id', $details->file_id);


        return view('supervisors.progress_details', compact('details','file_revisions','comments'));
    }



}
