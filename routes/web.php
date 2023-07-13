<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\Manajemen\UserController;
use App\Http\Controllers\Manajemen\MenuController;
use App\Http\Controllers\Manajemen\PermissionController;
use App\Http\Controllers\Manajemen\RoleController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

// login
Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
});

// routes di web/user.php yang digunakan oleh semua role
Route::middleware('auth')->group(function () {
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth.session-browser')->group(function () {
        // authentication
        Route::name('auth.')->group(function () {
            // ganti password
            Route::post('/change-password/proses', [AuthController::class, 'changePasswordSubmit'])->name('change-password-submit');

            // form expired password
            Route::get('/expired-password', [AuthController::class, 'expiredPassword'])->name('expired-password');
        });

        Route::middleware('auth.check-users-expired')->group(function () {
            // form ganti password
            Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');

            // dashboard
            Route::redirect('/', '/dashboard');
            Route::get('/dashboard', [HomeController::class, 'index'])->name('index');

            // konfigurasi
            Route::name('konfigurasi.')->group(function () {
                // users last seen
                Route::get('/last-seen', [KonfigurasiController::class, 'lastSeen'])->name('last-seen')->middleware('permission:user_last_seen');

                // users log activity
                Route::get('/user-activity', [KonfigurasiController::class, 'userActivity'])->name('log-activity')->middleware('permission:user_log_activity');
                Route::post('/decrypt', [KonfigurasiController::class, 'decrypt'])->name('decrypt')->middleware('permission:decrypt');
            });

            // manajemen sekuriti
            Route::prefix('manajemen-sekuriti')->name('manajemen-sekuriti.')->middleware('permission:security')->group(function () {
                Route::get('/', [KonfigurasiController::class, 'sekuriti'])->name('index');
                Route::post('/update', [KonfigurasiController::class, 'sekuritiUpdate'])->name('update');
            });

            // manajemen user
            Route::name('manajemen-user.')->group(function () {
                Route::get('/manajemen-user/{user}/buka-blokir', [UserController::class, 'unlockUser'])->name('buka-blokir')->middleware('permission:user_unblock');
                Route::get('/manajemen-user/{user}/lepas-ip', [UserController::class, 'resetIPUser'])->name('lepas-ip')->middleware('permission:user_remove_ip');
                Route::get('/profile', [UserController::class, 'changeProfile'])->name('change-profile');
                Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
                Route::get('/remove-profile-picture', [UserController::class, 'removeProfilePicture'])->name('remove-profile-picture');
            });
            Route::resource('/manajemen-user', UserController::class, ['parameters' => ['manajemen-user' => 'id']])->except('destroy');

            // manajemen menu
            Route::get('/menus/{id}/delete', [MenuController::class, 'delete'])->name('menus.delete')->middleware('permission:menu_delete');
            Route::resource('/menus', MenuController::class, ['parameters' => ['menus' => 'id']])->except(['show', 'destroy']);

            // manajemen role
            Route::resource('/roles', RoleController::class, ['parameters' => ['roles' => 'id']])->except(['show', 'destroy']);

            // manajemen akses
            Route::resource('/permissions', PermissionController::class, ['parameters' => ['permissions' => 'id']])->except(['show', 'destroy']);

            // crud
            Route::resource('/crud', CrudController::class, ['parameters' => ['crud' => 'id']])->except(['show']);

            Route::resource('/asasa', RoleController::class, ['parameters' => ['roles' => 'id']])->except(['show']);
        });
    });
});

// Route::get('/files', UploadController::class, ['parameters' => ['files' => 'id']]);
