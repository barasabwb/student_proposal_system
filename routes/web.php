<?php

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Students\FileController;
use App\Http\Controllers\Supervisors\SupervisorsController;
use Illuminate\Support\Facades\Auth;
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
Route::get('admin/rejected/', 'Admin\PagesController@showRejectedFiles')->name('admin.rejected_files')->middleware('admin');

Route::post('admin/reject/{reject}', 'Admin\FileController@rejectFile')->name('admin.reject')->middleware('admin');

Route::get('admin/supervisors', 'Admin\PagesController@showSupervisors')->name('admin.supervisors')->middleware('admin');
Route::get('admin/students', 'Admin\PagesController@showStudents')->name('admin.students')->middleware('admin');
Route::get('admin/adduser', 'Admin\PagesController@openUserForm')->name('admin.userForm')->middleware('admin');
Route::post('download/{download}', 'Admin\FileController@downloadFile')->name('admin.download')->middleware('admin');
Route::post('downloadRevision/{downloadRevision}', 'Admin\FileController@downloadRevision')->name('admin.downloadRevision')->middleware('admin');
Route::delete('revision/{revision}', 'Students\FileController@destroyRevision')->name('student.deleteRevision')->middleware('admin');



Route::get('admin/accepted_proposals', 'Admin\PagesController@showApprovedFiles')->name('admin.accepted')->middleware('admin');
Route::get('admin/accepted_proposals/{accepted_proposals}',[PagesController::class, 'openAcceptedDetails'])->middleware('admin');
Route::post('admin/adduser', 'Admin\AdminController@addUser')->name('admin.addUser')->middleware('admin');



//Route::get('admin/files', 'Admin\AdminController@index')->name('admin.files')->middleware('admin');
Route::get('/students', 'HomeController@handleStudent')->name('student.route')->middleware('admin');
Route::get('/supervisors', 'HomeController@handleSupervisor')->name('supervisor.route')->middleware('admin');
Route::get('/students/upload',[\App\Http\Controllers\Students\PagesController::class, 'openUploadForm'])->name('studentUpload');
Route::get('/students/accepted_proposals',[\App\Http\Controllers\Students\PagesController::class, 'openMyAcceptedProposals'])->name('openAccepted');
Route::get('/students/accepted_proposals/{accepted_proposals}',[\App\Http\Controllers\Students\PagesController::class, 'openAcceptedDetails']);




Route::post('/students/upload', [FileController::class, 'fileUpload'])->name('fileUpload');
Route::post('/students/makerevision', [FileController::class, 'addRevision'])->name('uploadRevision');

Route::get('supervisors/assigned', 'Supervisors\PagesController@openMyAssignedProposals')->name('supervisors.assigned')->middleware('admin');
Route::get('supervisors/finalized', 'Supervisors\PagesController@openFinalizedProposals')->name('supervisors.finalized')->middleware('admin');

Route::get('supervisors/assigned/{assigned}',[\App\Http\Controllers\Supervisors\PagesController::class, 'openAcceptedDetails']);
Route::post('supervisors/addComment', [SupervisorsController::class, 'addComment'])->name('supervisors.addComment');
Route::get('supervisors/finalize/{finalize}', 'Supervisors\SupervisorsController@openFinalizeForm')->name('supervisors.finalizeForm')->middleware('admin');
Route::post('supervisors/finalize/{finalize}', 'Supervisors\SupervisorsController@finalizeProposal')->name('supervisors.finalize')->middleware('admin');
Route::delete('comment/{comment}', 'Supervisors\SupervisorsController@destroyComment')->name('supervisor.destroyComment')->middleware('admin');


Route::get('/chairman', 'HomeController@handleChairman')->name('chairman.route')->middleware('admin');
Route::get('chairman/approved', 'chairman\PagesController@openApprovedProposals')->name('chairman.approved')->middleware('admin');
Route::get('chairman/approved/{approved}', 'chairman\PagesController@openAcceptedDetails')->name('chairman.approvedDetails')->middleware('admin');
Route::get('chairman/finalize/{finalize}', 'chairman\ChairmanController@openFinalizeForm')->name('chairman.finalizeForm')->middleware('admin');
Route::post('chairman/finalize/{finalize}', 'chairman\ChairmanController@finalizeProposal')->name('chairman.finalize')->middleware('admin');


//Route::get('/students/myproposals',[\App\Http\Controllers\Students\PagesController::class, 'openMyProposals'])->name('myProposals');
Route::resource('students/myproposals','students\FileController');
Route::resource('admin/files','Admin\FileController');




