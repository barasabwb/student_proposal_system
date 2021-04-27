<?php


namespace App\Http\Controllers\Chairman;
use App\ProposalProgress;
use App\students\File;
use App\students\Revision;
use App\SupervisorComments;


class PagesController extends \App\Http\Controllers\Controller
{

    public function openApprovedProposals(){
        $accepted_files= ProposalProgress::all()->where('supervisor_status', 'Ready for Chairman Review')->sortBy('created_at');

        return view('chairman.approved_files', compact('accepted_files'));
    }
    public function openAcceptedDetails($id){
        $details = ProposalProgress::find($id);
        $file_revisions = Revision::all()->where('file_id',$details->file_id);
        $final_revision = Revision::latest()->first();
//        $comments = SupervisorComments::all()->where('file_id', $details->file_id);


        return view('chairman.progress_details', compact('details','file_revisions','comments','final_revision'));
    }



}
