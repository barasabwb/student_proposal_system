<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role=='admin') {
            return view('admin.home');


        }else if (Auth::user()->role=='student') {
            return view('students.home');


        }else if (Auth::user()->role=='supervisor') {
            return view('supervisors.home');


        }
        return view('home');
    }
    public function handleAdmin()
    {
        return view('admin.home');
    }
    public function handleStudent()
    {
        return view('students.home');
    }
    public function handleSupervisor()
    {
        return view('supervisors.home');
    }
}
