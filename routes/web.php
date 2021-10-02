<?php

use Illuminate\Support\Facades\Route;
// Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberCrudController;
use App\Http\Controllers\Admin\TrainerCrudController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PackageController;
// Admin Controller

// Member Controller
use App\Http\Controllers\Member\MemberController;
// Member Controller

// Trainer Controller
use App\Http\Controllers\Trainer\TrainerController;
// Trainer Controller

use App\Http\Controllers\RegistrationController;
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
Route::get('/trainerLogout',[LogoutController::class,'trainer_logout'])->name('trainer.logout');
//orbitech

Route::group(['middleware'=>['AuthCheck']] , function(){

    Route::resource('/Admin', AdminController::class);
    Route::get('/admin/adminPanel', [AdminController::class,'index']);
    // Route::post('/admin/adminPanel', [AdminController::class,'save_member']);

    Route::get('/admin/member_search', [MemberCrudController::class,'member_details'])->name('search.live_search');
    Route::post('/admin/member_search', [MemberCrudController::class,'save_member'])->name('admin.add_member');
    Route::get('/member_search/action', [MemberCrudController::class,'member_action'])->name('admin.memberaction');

    Route::get('/admin/editmember/{id}', [MemberCrudController::class,'editmember'])->name('admin.editmember');
    Route::post('/admin/editmember/{id}', [MemberCrudController::class,'member_update'])->name('admin.member_update');
    // Route::get('/member_search/{id}', [AdminController::class,'member_details'])->name('search.live_search');
    // Route::post('/member_search/{id}', [AdminController::class,'member_details'])->name('search.live_search');
    Route::get('/admin/deleteMember/{id}', [MemberCrudController::class, 'delete_member'])->name('admin.delete_member');
    Route::post('/admin/deleteMember/{id}', [MemberCrudController::class, 'destroy_member'])->name('admin.destroy_member');

    Route::get('/admin/addTrainer', [TrainerCrudController::class,'trainers_details'])->name('admin.trainers_details');
    Route::post('/admin/addTrainer', [TrainerCrudController::class,'save_trainer'])->name('admin.save_trainer');
    Route::get('/admin/edittrainer/{id}',[TrainerCrudController::class,'edit_trainer'])->name('admin.edit_trainer');
    Route::post('/admin/edittrainer/{id}', [TrainerCrudController::class,'trainer_update'])->name('admin.trainer_update');

    Route::get('/admin/deleteTrainer/{id}', [TrainerCrudController::class,'delete_trainer'])->name('admin.delete_trainer');
    Route::post('/admin/deleteTrainer/{id}', [TrainerCrudController::class,'destroy_trainer'])->name('admin.destroy_trainer');

    Route::get('/admin/payment', [PaymentController::class,'index']);
    Route::post('/admin/payment', [PaymentController::class,'payment']);

    Route::get('/admin/package', [PackageController::class,'index'])->name('package.index');
    Route::post('/admin/package', [PackageController::class,'package'])->name('package.add_package');

    Route::get('/admin/package/{id}', [PackageController::class,'delete_package'])->name('package.delete_package');
    // Route::post('/package/{id}', [PackageController::class,'destroy_package'])->name('package.destroy_package');

    Route::get('/admin/editpackage/{id}', [PackageController::class,'edit_package'])->name('package.edit_package');
    Route::post('/admin/editpackage/{id}', [PackageController::class,'update_package'])->name('package.update_package');
});

/*Member Part*/
Route::group(['middleware'=>['MemberCheck']],function(){
    Route::get('/memberPanel', [MemberController::class,'index'])->name('member.index');
    Route::get('/memberProfile', [MemberController::class,'profile'])->name('member.profile');
    Route::post('/memberProfile', [MemberController::class,'update_profile'])->name('member.update_profile');
    Route::get('/memberPackage', [MemberController::class,'getPackage'])->name('member.get_package');
    Route::post('/memberPackage', [MemberController::class,'setPackage'])->name('member.set_package');
    Route::get('/memberPayment', [MemberController::class,'getPayment'])->name('member.member_getPayment');
    Route::post('/memberPayment', [MemberController::class,'setPayment'])->name('member.member_postPayment');
});
/*Member Part*/

/*Trainer Part*/
Route::group(['middleware'=>['TrainerCheck']],function(){
    Route::resource('/Trainer', TrainerController::class);
    Route::get('/trainer/trainerPanel', [TrainerController::class,'index'])->name('member.index');
    Route::get('/trainer/trainerProfile', [TrainerController::class,'profile'])->name('trainer.profile');
    Route::post('/trainer/trainerProfile', [TrainerController::class,'update_profile'])->name('trainer.update_profile');
});
/*Trainer Part*/

