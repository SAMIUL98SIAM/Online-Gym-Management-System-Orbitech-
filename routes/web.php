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

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;



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
    // Route::resource('/admin/memberList',MemberCrudController::class);

    Route::resource('/admin/member', MemberCrudController::class);
    Route::get('/admin/member/create', [MemberCrudController::class,'create'])->name('admin.member.create');
    Route::post('/admin/member/create', [MemberCrudController::class,'store'])->name('admin.member.store');
    Route::get('/admin/member/edit/{id}', [MemberCrudController::class,'edit'])->name('admin.member.edit');
    Route::post('/admin/member/edit/{id}', [MemberCrudController::class,'update'])->name('admin.member_update');
    Route::get('/admin/member/delete/{id}', [MemberCrudController::class, 'delete'])->name('admin.member.delete');
    Route::post('/admin/member/delete/{id}', [MemberCrudController::class, 'destroy'])->name('admin.member.destroy');
    Route::get('/member_search/action', [MemberCrudController::class,'member_action'])->name('admin.memberaction');


    Route::resource('/admin/trainer', TrainerCrudController::class);
    Route::get('/admin/trainer/create', [TrainerCrudController::class,'index'])->name('admin.trainers_details');
    Route::post('/admin/trainer/create', [TrainerCrudController::class,'store'])->name('admin.save_trainer');
    Route::get('/admin/trainer/edit/{id}',[TrainerCrudController::class,'edit'])->name('admin.edit_trainer');
    Route::post('/admin/trainer/edit/{id}', [TrainerCrudController::class,'update'])->name('admin.trainer_update');
    Route::get('/admin/trainer/delete/{id}', [TrainerCrudController::class,'delete'])->name('admin.delete_trainer');
    Route::post('/admin/trainer/delete/{id}', [TrainerCrudController::class,'destroy'])->name('admin.destroy_trainer');

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

