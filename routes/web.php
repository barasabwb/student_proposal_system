<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('/students', 'HomeController@handleStudent')->name('student.route')->middleware('admin');
Route::get('/supervisors', 'HomeController@handleSupervisor')->name('supervisor.route')->middleware('admin');
Route::get('/students/upload',[\App\Http\Controllers\Students\PagesController::class, 'openUploadForm'])->name('studentUpload');
Route::post('/students/upload', [\App\Http\Controllers\students\FileController::class, 'fileUpload'])->name('fileUpload');
//Route::get('/students/myproposals',[\App\Http\Controllers\Students\PagesController::class, 'openMyProposals'])->name('myProposals');
Route::resource('students/myproposals','students\FileController');




