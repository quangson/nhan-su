<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DayoffController;

use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\Admin\TimekeepAccountController;
use App\Http\Controllers\User\TimekeepAccountUserController;

use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Personal\HomePersonalController;
use App\Http\Controllers\Personal\LoginPersonalController;


use App\Http\Controllers\PayController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('quan-ly', [LoginController::class, 'showLoginForm'])->name('admin-login');
Route::post('quan-ly', [LoginController::class, 'postFormLogin'])->name('admin-post-login');
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin-index');
    Route::get('logout', [HomeController::class, 'logout'])->name('admin-logout');

    Route::get('khoa-phong', [GroupController::class, 'index'])->name('group.list');
    Route::get('tao-khoa-phong', [GroupController::class, 'create'])->name('group.create');
    Route::post('tao-khoa-phong', [GroupController::class, 'store'])->name('group.store');
    Route::get('sua-khoa-phong/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::post('sua-khoa-phong/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::get('xoa-khoa-phong/{id}', [GroupController::class, 'destroy'])->name('group.delete');
    Route::post('group-export-view', [GroupController::class, 'exportview'])->name('group.export-view');

    Route::get('nhan-vien', [EmployeeController::class, 'index'])->name('employee.list');
    Route::get('tao-nhan-vien', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('tao-nhan-vien', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('sua-nhan-vien/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('sua-nhan-vien/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('xoa-nhan-vien/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    Route::post('employee-export-form', [EmployeeController::class, 'exportFormRegister'])->name('employee.export-form');
    Route::post('employee-import-register', [EmployeeController::class, 'importRegister'])->name('employee.import-register');

    Route::get('ngay-nghi', [DayoffController::class, 'index'])->name('dayoff.list');
    Route::get('sua-ngay-nghi/{id}', [DayoffController::class, 'edit'])->name('dayoff.edit');
    Route::post('sua-ngay-nghi/{id}', [DayoffController::class, 'update'])->name('dayoff.update');
    Route::get('xoa-ngay-nghi/{id}', [DayoffController::class, 'destroy'])->name('dayoff.delete');
    Route::post('dayoff-export-form', [DayoffController::class, 'exportFormRegister'])->name('dayoff.export-form');
    Route::post('dayoff-import-register', [DayoffController::class, 'importRegister'])->name('dayoff.import-register');

    Route::get('tai-khoan-cham-cong', [TimekeepAccountController::class, 'index'])->name('timekeepaccount.list');
    Route::get('tao-tai-khoan-cham-cong', [TimekeepAccountController::class, 'create'])->name('timekeepaccount.create');
    Route::post('tao-tai-khoan-cham-cong', [TimekeepAccountController::class, 'store'])->name('timekeepaccount.store');
    Route::get('sua-tai-khoan-cham-cong/{id}', [TimekeepAccountController::class, 'edit'])->name('timekeepaccount.edit');
    Route::post('sua-tai-khoan-cham-cong/{id}', [TimekeepAccountController::class, 'update'])->name('timekeepaccount.update');
    Route::get('xoa-tai-khoan-cham-cong/{id}', [TimekeepAccountController::class, 'destroy'])->name('timekeepaccount.delete');
    Route::get('timekeep-edit', [TimekeepAccountController::class, 'showTimeKeepPersonal'])->name('timekeepPersonnal.show');
    Route::get('timekeep-list/{id}', [TimekeepAccountController::class, 'listTimeKeepPersonal'])->name('timekeepPersonnal.list');
    Route::get('timekeep-edit/{id}', [TimekeepAccountController::class, 'editTimeKeepPersonal'])->name('timekeepPersonnal.edit');
    Route::post('timekeep-update', [TimekeepAccountController::class, 'updateTimeKeepPersonal'])->name('timekeepPersonnal.update');
});

Route::get('he-thong', [LoginUserController::class, 'showLoginForm'])->name('user-login');
Route::post('he-thong', [LoginUserController::class, 'postFormLogin'])->name('user-post-login');
// Route::get('user-login', [LoginUserController::class, 'showLoginForm'])->name('user-login');
// Route::post('user-login', [LoginUserController::class, 'postFormLogin'])->name('user-post-login');
Route::middleware(['checkLoginUser'])->group(function () {
    Route::get('user', [HomeUserController::class, 'index'])->name('user-index');
    Route::get('user-logout', [HomeUserController::class, 'logout'])->name('user-logout');
    Route::get('cham-cong', [TimekeepAccountUserController::class, 'setTimeKeep'])->name('set-timekeep-user');
    Route::post('timekeep-update-status',[TimekeepAccountUserController::class, 'updateTimekeepStatus'])->name('timekeep-update-status');
});

Route::get('/', [LoginPersonalController::class, 'showLoginForm'])->name('personal-login');
Route::post('personal-login', [LoginPersonalController::class, 'postFormLogin'])->name('personal-post-login');
Route::middleware(['checkLoginPersonal'])->group(function () {
    Route::get('personal-login', [HomePersonalController::class, 'index'])->name('personal-index');
    Route::get('thong-tin-nghi', [PersonalController::class, 'index'])->name('personal-info');
    // Route::get('personal-info', [PersonalController::class, 'index'])->name('personal-info');
    Route::get('thong-tin-nghi-bu', [PersonalController::class, 'getCompensatoryDay'])->name('personal-Compensatory-Day');
    Route::get('thong-tin-nghi-phep', [PersonalController::class, 'getAnnualLeave'])->name('personal-Annual-Leave');
    Route::get('thong-tin-nghi-om', [PersonalController::class, 'getSickLeave'])->name('personal-Sick-Leave');
    Route::get('danh-sach-nghi-khong-luong', [PersonalController::class, 'getUnpaidLeave'])->name('personal-Unpaid-Leave');
    Route::get('danh-sach-nghi-di-hoc', [PersonalController::class, 'getSchoolLeave'])->name('personal-School-Leave');
    Route::get('danh-sach-nghi-che-do', [PersonalController::class, 'getRegimeLeave'])->name('personal-Regime-Leave');
    Route::get('danh-sach-nghi', [PersonalController::class, 'getLeave'])->name('personal-Leave');
    Route::get('danh-sach-nghi-khong-phep', [PersonalController::class, 'getNotLeave'])->name('personal-Not-Leave');
    Route::get('personal-logout', [HomePersonalController::class, 'logout'])->name('personal-logout');

});
