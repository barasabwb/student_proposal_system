<?php


namespace App\Http\Controllers\Students;
use App\students\File;


class PagesController extends \App\Http\Controllers\Controller
{
    public function openUploadForm()
    {

        return view('students.upload');
    }
    public function openMyProposals(){
        $my_files= File::all()->where('username', auth()->user()->username)->sortByDesc('created_at');

        return view('students.my_proposals', compact('my_files'));
    }


}
