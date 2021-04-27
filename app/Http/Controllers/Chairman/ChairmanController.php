<?php

namespace App\Http\Controllers\Chairman;


use App\Http\Controllers\Controller;
use App\ProposalProgress;
use App\students\File;
use App\SupervisorComments;
use App\User;
use Illuminate\Http\Request;


class ChairmanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('chairman.home');
    }
    public function openFinalizeForm($id)
    {
        $file= ProposalProgress::find($id);






        return view('chairman.finalize_form', compact('file'));
    }

        public function finalizeProposal(Request $req, $file_id){
        $req->validate([
            'final_comment'  => ['required', 'string', 'max:255'],
            'status'  => ['required', 'string', 'max:255'],
        ]);
        $progress_file = ProposalProgress::find($file_id);
        $progress_file->chairman_final_comment = $req->input('final_comment');
        $progress_file->chairman_status = $req->input('status');
        $progress_file->save();


            return redirect(route('chairman.approved'))
                ->with('success','Document Accepted');




        }




}
