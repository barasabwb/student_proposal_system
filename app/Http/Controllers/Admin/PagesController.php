<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
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



}
