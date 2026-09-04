<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NotepadController as AdminNotepadController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\NotepadController as UserNotepadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Auth
|--------------------------------------------------------------------------
*/
// Route::middleware('allow-specific-ip')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('guest:admin')->group(function () {
            Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [AdminLoginController::class, 'login'])->name('login.submit');
        });

        Route::middleware('auth:admin')->group(function () {
            Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::resource('users', AdminUserController::class);
            Route::resource('notepads', AdminNotepadController::class);
            Route::get('deleted-data', [AdminNotepadController::class, 'deleted_data'])->name('deleted-data');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | User Auth
    |--------------------------------------------------------------------------
    */
    Route::prefix('user')->name('user.')->group(function () {
        Route::middleware('guest:web')->group(function () {
            Route::get('login', [UserLoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [UserLoginController::class, 'login'])->name('login.submit');
        });

        Route::middleware('auth:web')->group(function () {
            Route::post('logout', [UserLoginController::class, 'logout'])->name('logout');
            Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
            Route::resource('notepads', UserNotepadController::class);
        });
    });
// });