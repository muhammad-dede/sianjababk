<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
Route::get('/tentang', [\App\Http\Controllers\WebsiteController::class, 'tentang'])->name('tentang');
Route::get('/download', [\App\Http\Controllers\WebsiteController::class, 'download'])->name('download');
Route::get('/kontak', [\App\Http\Controllers\WebsiteController::class, 'kontak'])->name('kontak');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('unit-kerja', App\Http\Controllers\UnitKerjaController::class);
    Route::resource('skpd', App\Http\Controllers\SkpdController::class);

    // Jabatan Anjab ABK
    Route::group(['prefix' => 'analisa', 'as' => 'analisa.'], function () {
        Route::get('/', [\App\Http\Controllers\AnalisaController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\AnalisaController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\AnalisaController::class, 'store'])->name('store');
        Route::get('/create/analisa-jabatan', [\App\Http\Controllers\AnalisaController::class, 'createAnjab'])->name('create.anjab');
        Route::post('/store/analisa-jabatan', [\App\Http\Controllers\AnalisaController::class, 'storeAnjab'])->name('store.anjab');
        Route::get('/create/analisa-beban-kerja', [\App\Http\Controllers\AnalisaController::class, 'createAbk'])->name('create.abk');
        Route::post('/store/analisa-beban-kerja', [\App\Http\Controllers\AnalisaController::class, 'storeAbk'])->name('store.abk');

        Route::get('jabatan', [\App\Http\Controllers\AnalisaController::class, 'jabatan'])->name('jabatan');
        Route::get('beban-kerja', [\App\Http\Controllers\AnalisaController::class, 'bebanKerja'])->name('beban-kerja');
    });

    //Account Resource
    Route::get('/account/profile', [App\Http\Controllers\AccountController::class, 'profile'])->name('account.profile');
    Route::post('/account/profile', [App\Http\Controllers\AccountController::class, 'updateProfile'])->name('account.profile');
    Route::get('/account/password', [App\Http\Controllers\AccountController::class, 'password'])->name('account.password');
    Route::post('/account/password', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('account.password');
    // Notification Resource
    Route::get('notification', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
    Route::get('notification/read/{id}', [\App\Http\Controllers\NotificationController::class, 'read'])->name('notification.read');
    Route::get('notification/read-all', [\App\Http\Controllers\NotificationController::class, 'readAll'])->name('notification.read.all');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
    'confirm' => false, // Confirmasi Password Routes...
]);

 // Route::resource('permission', App\Http\Controllers\PermissionController::class);
 // Route::resource('role', App\Http\Controllers\RoleController::class);
