<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SiamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;



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
Route::post('/',[LoginController::class,'login'])->name('auth.login');
Route::get('/register',[RegistrationController::class,'index'])->name('auth.registration');
Route::post('/register',[RegistrationController::class,'save'])->name('auth.registration');
Route::get('/logout',[LogoutController::class,'logout'])->name('auth.logout');
Route::get('/memberLogout',[LogoutController::class,'member_logout'])->name('member.logout');

//orbitech

Route::group(['middleware'=>['AuthCheck']] , function(){
   
    Route::get('/adminPanel', [AdminController::class,'index']);
    Route::post('/adminPanel', [AdminController::class,'save_member']);
    // Route::get('/memberlist', [AdminController::class,'member_details']);
    // Route::get('/memberlist/search', [AdminController::class,'member_action'])->name('membersearch.action');
    
    Route::get('/member_search', [AdminController::class,'member_details'])->name('search.live_search');
    Route::get('/member_search/action', [AdminController::class,'member_action'])->name('admin.memberaction');


    // Route::get('/memberlist/{id}', [AdminController::class,'member_edit']);
    Route::get('/editmember/{id}', [AdminController::class,'editmember'])->name('admin.editmember');
    Route::post('/editmember/{id}', [AdminController::class,'member_update'])->name('admin.member_update');

    Route::post('/memberlist/{id}', [AdminController::class,'member_update']);

    Route::get('/addTrainer', [AdminController::class,'trainers_details'])->name('admin.add_trainer');
    Route::post('/addTrainer', [AdminController::class,'save_trainer']);
    Route::get('/edittrainer',[AdminController::class,'edit_trainer'])->name('admin.edit_trainer');
    Route::post('/edittrainer/{id}', [AdminController::class,'trainer_update']);

    // Route::get('/deletetrainer/{id}', [AdminController::class,'delete_trainer'])->name('admin.delete_trainer');
    Route::post('/deletetrainer/{id}', [AdminController::class,'destroy_trainer'])->name('admin.destroy_trainer');
    
    Route::get('/payment', [PaymentController::class,'index']);
    Route::post('/payment', [PaymentController::class,'payment']);

    Route::get('/package', [PackageController::class,'index'])->name('package.index');
    Route::post('/package', [PackageController::class,'package'])->name('package.add_package');
    Route::get('/editpackage/{id}', [PackageController::class,'edit_package'])->name('package.edit_package');
    Route::post('/editpackage/{id}', [PackageController::class,'update_package'])->name('package.update_package');
});



Route::group(['middlware'=>['MemberCheck']],function(){
    /*Member Part*/
    Route::get('/memberPanel', [MemberController::class,'index'])->name('member.index');
    /*Member Part*/
    
});

