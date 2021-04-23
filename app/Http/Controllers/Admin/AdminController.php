<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\students\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files= File::all()->sortByDesc('created_at');



        return view('admin.files', compact('files'));
    }
    public function openApproveForm($id)
    {
        $file= File::find($id);
        $supervisors = User::all()->where('role','supervisor');




        return view('admin.supervisors_assignment', compact('file','supervisors'));
    }
    public function addUser(Request $req){
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
//        $user = new User();
//        $user->name = $req->input('name');
//        $user->username = $req->input('username');
//        $user->role = $req->input('role');
//        $user->email = $req->input('email');
//        $user->password = Hash::make($req->input('password'));
//        $user->save();

        User::create([
            'name' => $req->input('name'),
            'email' => $req->input('username'),
            'role'=>$req->input('role'),
            'username'=>$req->input('email'),
            'password' => Hash::make($req->input('password')),
        ]);
        return back()
            ->with('success','User has been created.');


    }

}
