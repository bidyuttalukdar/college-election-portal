<?php

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

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\VotingPortal\VotingPortalController;

Route::get('/', function () {
    return redirect('login');// return redirect('login'); 
});

Route::get('/login',function(){
    return redirect('login');
});


Route::any('/register/getStudentData',[GeneralController::class,'getStudentDetail']);
Route::any('/register/studentVoting',[GeneralController::class,'registrationForVoting']);


Route::any('/voting/dashboard',[VotingPortalController::class,'index']);
Route::any('/voting/vote',[VotingPortalController::class,'registerVote']);
Route::any('/voting/success',[VotingPortalController::class,'successfullyVoted']);
Route::any('/voting/confimation',[VotingPortalController::class,'confirmationPageDetails']);
Route::any('/voting/confimation/view',[VotingPortalController::class,'confirmationPageView']);

Auth::routes();
Route::any('/admin/candidate-details/add-candidate/details', [AdminController::class,'studentDetails']);
Route::any('/admin/electorial-post-details/update', [AdminController::class,'updateElectorialDetails']);
Route::any('/admin/electorial-post-details/details', [AdminController::class,'electorialDetails']);
Route::any('/admin/candidate-details/add-candidate/add', [AdminController::class,'addCandidate']);
Route::any('/admin/candidate-details/create-candidate', [AdminController::class,'createCandidate']);
Route::any('/admin/candidate-details/details', [AdminController::class,'candidateDetails']);
Route::any('/admin/vote-count',[AdminController::class,'voteCount']);
Route::any('/admin/vote-count-report-pdf',[AdminController::class,'getVoteCountPdf']);
Route::get('/admin/vote-count-report-excel',[AdminController::class,'getVoteCountExcel']);
Route::get('/admin/voting-user-activated', [AdminController::class,'activateVoting']);
Route::get('/admin/voting-user-deactivated', [AdminController::class,'deactivateVoting']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/index',[AdminController::class,'index']);