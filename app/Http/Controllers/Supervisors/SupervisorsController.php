<?php

namespace App\Http\Controllers\Supervisors;


use App\Http\Controllers\Controller;
use App\ProposalProgress;
use App\students\File;
use App\SupervisorComments;
use App\User;
use Illuminate\Http\Request;


class SupervisorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('supervisors.home');
    }
    public function openFinalizeForm($id)
    {
        $file= ProposalProgress::find($id);





        return view('supervisors.finalize_form', compact('file'));
    }
    public function addComment(Request $req){
        $req->validate([

            'comment' => ['required', 'string', 'max:255']
        ]);

        $commentModel = new SupervisorComments();
        $file_id = $req->input('file_id');
        $supervisor_id= auth()->user()->id;
        $commentModel->file_id=$file_id;
        $commentModel->supervisor_id=$supervisor_id;
        $commentModel->comment = $req->input('comment');
        $commentModel->save();

            return back()
                ->with('success','Comment Uploaded.');

        }
        public function finalizeProposal(Request $req, $file_id){
        $req->validate([
            'final_comment'  => ['required', 'string', 'max:255'],
            'status'  => ['required', 'string', 'max:255'],
        ]);
        $progress_file = ProposalProgress::find($file_id);
        $progress_file->supervisor_final_comment = $req->input('final_comment');
        $progress_file->supervisor_status = $req->input('status');
        $progress_file->save();


            return redirect(route('supervisors.assigned'))
                ->with('success','Ready for chairman Review');




        }




}
