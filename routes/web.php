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
Route::get('/admin', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('admin/approve/{approve}', 'Admin\AdminController@openApproveForm')->name('admin.assign')->middleware('admin');
Route::post('admin/approve/{approve}', 'Admin\FileController@approveFile')->name('admin.approve')->middleware('admin');
Route::get('admin/supervisors', 'Admin\PagesController@showSupervisors')->name('admin.supervisors')->middleware('admin');
Route::get('admin/students', 'Admin\PagesController@showStudents')->name('admin.students')->middleware('admin');
Route::get('admin/adduser', 'Admin\PagesController@openUserForm')->name('admin.userForm')->middleware('admin');
Route::post('admin/adduser', 'Admin\AdminController@addUser')->name('admin.addUser')->middleware('admin');



//Route::get('admin/files', 'Admin\AdminController@index')->name('admin.files')->middleware('admin');
Route::get('/students', 'HomeController@handleStudent')->name('student.route')->middleware('admin');
Route::get('/supervisors', 'HomeController@handleSupervisor')->name('supervisor.route')->middleware('admin');
Route::get('/students/upload',[\App\Http\Controllers\Students\PagesController::class, 'openUploadForm'])->name('studentUpload');
Route::get('/students/accepted_proposals',[\App\Http\Controllers\Students\PagesController::class, 'openMyAcceptedProposals'])->name('openAccepted');
Route::get('/students/accepted_proposals/{accepted_proposals}',[\App\Http\Controllers\Students\PagesController::class, 'openAcceptedDetails']);

Route::post('/students/upload', [\App\Http\Controllers\students\FileController::class, 'fileUpload'])->name('fileUpload');
Route::post('/students/makerevision', [\App\Http\Controllers\students\FileController::class, 'addRevision'])->name('uploadRevision');

//Route::get('/students/myproposals',[\App\Http\Controllers\Students\PagesController::class, 'openMyProposals'])->name('myProposals');
Route::resource('students/myproposals','students\FileController');
Route::resource('admin/files','Admin\FileController');




