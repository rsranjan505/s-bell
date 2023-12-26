<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\location\CityController;
use App\Http\Controllers\Admin\ResetPasswordRequestController;
use App\Http\Controllers\Admin\Setting\DepartmentController;
use App\Http\Controllers\Admin\Setting\DesignationController;
use App\Http\Controllers\Admin\Setting\TeamController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\QrProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('comming-soon');
});

Route::post('/register', [AuthController::class, 'createUser'])->name('register');
Route::get('/login', [AuthController::class, 'loginview'])->name('user-login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

Route::get('/request-password', [ResetPasswordRequestController::class, 'reqForgotPasswordView'])->name("request-password-view");
Route::post('/request-password', [ResetPasswordRequestController::class, 'reqForgotPassword'])->name("request-password");
Route::get('/reset-password/{token}', [ResetPasswordRequestController::class, 'resetPasswordView'])->name("reset-password-view");
Route::post('/reset-password', [ResetPasswordRequestController::class, 'updateForgotPassword'])->name("reset-password");
Route::get('/{token}/get-email-token', [ResetPasswordRequestController::class, 'getEmailFromToken'])->name("get-email-token");
Route::post('/logout', [AuthController::class, 'logout'])->name("logout");



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin/')->middleware('auth','web')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Departments
        Route::resource('departments', DepartmentController::class);
        Route::get('departments/change-status/{id}', [DepartmentController::class, 'changeStatus'])->name('departments-status-change');
        Route::resource('designation', DesignationController::class);
        Route::get('designation/change-status/{id}', [DesignationController::class, 'changeStatus'])->name('designation-status-change');
        Route::resource('team', TeamController::class);
        Route::get('team/change-status/{id}', [TeamController::class, 'changeStatus'])->name('team-status-change');

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('location/city', CityController::class);
        Route::get('city/{state_id}', [CityController::class, 'getCity'])->name('city.state');
        //users
        Route::get('user', [UserController::class, 'index'])->name('admin-user-add');
        Route::post('user', [UserController::class, 'createUser'])->name('admin-user-save');
        Route::get('user-list', [UserController::class, 'userList'])->name('admin-user-list');
        Route::get('user-view/{id?}', [UserController::class, 'show'])->name('admin-user-show');
        Route::get('user-update/{id?}', [UserController::class, 'edit'])->name('admin-user-edit');
        Route::post('user-update', [UserController::class, 'update'])->name('admin-user-update');
        Route::get('user/change-status/{id}', [UserController::class, 'changeStatus'])->name('admin-user-status-change');
        Route::get('user/setting', [UserController::class, 'settingView'])->name('setting-view');
        Route::post('user/change-password', [UserController::class, 'changePassword'])->name('admin-user-change-password');
        Route::get('user-delete/{id}', [UserController::class, 'deleteUser'])->name('admin-user-delete');
        Route::get('user-profile', [UserController::class, 'profile'])->name('user-profile');
        Route::post('team-assigned', [UserController::class, 'assigendTeam'])->name('team.assigned');

        //Customer
        Route::resource('customer', CustomerController::class);

        //QR CODE
        Route::resource('qr-code', QrProfileController::class);
        Route::get('qr-code',[QrProfileController::class,'generateQrCode'])->name('qr.generate');

});
