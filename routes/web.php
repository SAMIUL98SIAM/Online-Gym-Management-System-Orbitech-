<?php

use Illuminate\Support\Facades\Route;
// Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberCrudController;
use App\Http\Controllers\Admin\TrainerCrudController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\Member\AdminMemberPackageController;
// Admin Controller

// Member Controller
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\Member\MemberPackageController;
use App\Http\Controllers\Member\MemberPaymentController;
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

    //Route::resource('Admin', AdminController::class);
    Route::get('/admin/adminPanel', [AdminController::class,'index']);

    Route::resource('/admin/member', MemberCrudController::class);
    Route::get('/admin/member/create', [MemberCrudController::class,'index'])->name('admin.member.create');
    Route::post('/admin/member/create', [MemberCrudController::class,'store'])->name('admin.member.store');
    Route::get('/admin/member/edit/{id}', [MemberCrudController::class,'edit']);
    Route::post('/admin/member/edit/{id}', [MemberCrudController::class,'update'])->name('admin.member_update');
    Route::get('/admin/member/delete/{id}', [MemberCrudController::class, 'destroy'])->name('admin.member.delete');
    Route::get('/member_search/action', [MemberCrudController::class,'member_action'])->name('admin.memberaction');


    Route::resource('/admin/trainer', TrainerCrudController::class);

    // Route::get('/admin/trainer/create', [TrainerCrudController::class,'index'])->name('admin.trainers_details');
    Route::post('/admin/trainer/create', [TrainerCrudController::class,'store'])->name('admin.trainer.store');

    //Route::get('/admin/trainer/edit/{id}',[TrainerCrudController::class,'edit'])->name('admin.edit_trainer');
    Route::put('/admin/trainer/edit/{id}', [TrainerCrudController::class,'update'])->name('admin.trainer.update');

    // Route::get('/admin/trainer/delete/{id}', [TrainerCrudController::class,'delete'])->name('admin.delete_trainer');
    Route::post('/admin/trainer/delete/{id}', [TrainerCrudController::class,'destroy'])->name('admin.trainer.destroy');

    Route::get('/admin/payment', [PaymentController::class,'index']);
    Route::post('/admin/payment', [PaymentController::class,'payment']);
    Route::put('/admin/paymen/{id}', [AdminMemberPackageController::class,'update'])->name('admin.member.package.store');
    // Route::post('/admin/payment', [PaymentController::class,'package']);




    Route::resource('/admin/package',PackageController::class);
    Route::get('/admin/package/create', [PackageController::class,'index']);
    Route::post('/admin/package/create', [PackageController::class,'store'])->name('admin.package.store');

    // Route::get('/admin/edit/package/{id}', [PackageController::class,'edit']);
    Route::put('/admin/package/create/{id}', [PackageController::class,'update'])->name('admin.package.update');
    // Route::get('/admin/delete/package/{id}', [PackageController::class,'delete']);
    Route::get('/admin/delete/package/{id}', [PackageController::class,'destroy'])->name('admin.package.delete');

});


/*Member Part*/
Route::group(['middleware'=>['MemberCheck']],function(){
    Route::resource('/Member', MemberController::class);
    Route::get('/member/memberPanel', [MemberController::class,'index'])->name('member.index');

    Route::get('/member/profile', [MemberProfileController::class,'index'])->name('member.profile');
    Route::post('/member/profile', [MemberProfileController::class,'update'])->name('member.update_profile');

    Route::get('/member/package', [MemberPackageController::class,'index'])->name('member.get_package');
    Route::post('/member/package', [MemberPackageController::class,'store'])->name('member.set_package');

    Route::get('/member/payment', [MemberPaymentController::class,'index'])->name('member.member_getPayment');
    Route::post('/member/payment', [MemberPaymentController::class,'store'])->name('member.member_postPayment');
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

