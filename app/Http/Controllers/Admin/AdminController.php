<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\students\File;
use Illuminate\Http\Request;

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
}
