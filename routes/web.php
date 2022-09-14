<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
Route::get('/tentang', [\App\Http\Controllers\WebsiteController::class, 'tentang'])->name('tentang');
Route::get('/download', [\App\Http\Controllers\WebsiteController::class, 'download'])->name('download');
Route::get('/kontak', [\App\Http\Controllers\WebsiteController::class, 'kontak'])->name('kontak');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', App\Http\Controllers\UserController::class)->middleware('role:admin');
    Route::resource('unit-kerja', App\Http\Controllers\UnitKerjaController::class);
    Route::resource('skpd', App\Http\Controllers\SkpdController::class);
    Route::resource('jabatan', App\Http\Controllers\JabatanController::class);

    Route::group(['prefix' => 'analisa', 'as' => 'analisa.'], function () {
        // Analisa
        Route::get('/', [\App\Http\Controllers\AnalisaController::class, 'index'])->name('index');
        Route::get('/{id_jabatan}', [\App\Http\Controllers\AnalisaController::class, 'show'])->name('show');
        Route::post('/save/{id_jabatan}', [\App\Http\Controllers\AnalisaController::class, 'save'])->name('save');
        Route::get('/cetak/{id_jabatan}', [\App\Http\Controllers\AnalisaController::class, 'cetak'])->name('cetak');

        // Tugas Pokok
        Route::get('tugas-pokok/{id_jabatan}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'index'])->name('tugas-pokok.index');
        Route::get('tugas-pokok/create/{id_jabatan}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'create'])->name('tugas-pokok.create');
        Route::post('tugas-pokok/store/{id_jabatan}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'store'])->name('tugas-pokok.store');
        Route::get('tugas-pokok/edit/{id_tugas_pokok}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'edit'])->name('tugas-pokok.edit');
        Route::put('tugas-pokok/update/{id_tugas_pokok}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'update'])->name('tugas-pokok.update');
        Route::delete('tugas-pokok/destroy/{id_tugas_pokok}', [\App\Http\Controllers\AnalisaTugasPokokController::class, 'destroy'])->name('tugas-pokok.destroy');

        // Bahan Kerja
        Route::get('bahan-kerja/{id_jabatan}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'index'])->name('bahan-kerja.index');
        Route::get('bahan-kerja/create/{id_jabatan}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'create'])->name('bahan-kerja.create');
        Route::post('bahan-kerja/store/{id_jabatan}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'store'])->name('bahan-kerja.store');
        Route::get('bahan-kerja/edit/{id_bahan_kerja}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'edit'])->name('bahan-kerja.edit');
        Route::put('bahan-kerja/update/{id_bahan_kerja}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'update'])->name('bahan-kerja.update');
        Route::delete('bahan-kerja/destroy/{id_bahan_kerja}', [\App\Http\Controllers\AnalisaBahanKerjaController::class, 'destroy'])->name('bahan-kerja.destroy');

        // Perangkat Kerja
        Route::get('perangkat-kerja/{id_jabatan}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'index'])->name('perangkat-kerja.index');
        Route::get('perangkat-kerja/create/{id_jabatan}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'create'])->name('perangkat-kerja.create');
        Route::post('perangkat-kerja/store/{id_jabatan}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'store'])->name('perangkat-kerja.store');
        Route::get('perangkat-kerja/edit/{id_perangkat_kerja}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'edit'])->name('perangkat-kerja.edit');
        Route::put('perangkat-kerja/update/{id_perangkat_kerja}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'update'])->name('perangkat-kerja.update');
        Route::delete('perangkat-kerja/destroy/{id_perangkat_kerja}', [\App\Http\Controllers\AnalisaPerangkatKerjaController::class, 'destroy'])->name('perangkat-kerja.destroy');

        // Tanggung Jawab
        Route::get('tanggung-jawab/{id_jabatan}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'index'])->name('tanggung-jawab.index');
        Route::get('tanggung-jawab/create/{id_jabatan}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'create'])->name('tanggung-jawab.create');
        Route::post('tanggung-jawab/store/{id_jabatan}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'store'])->name('tanggung-jawab.store');
        Route::get('tanggung-jawab/edit/{id_tanggung_jawab}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'edit'])->name('tanggung-jawab.edit');
        Route::put('tanggung-jawab/update/{id_tanggung_jawab}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'update'])->name('tanggung-jawab.update');
        Route::delete('tanggung-jawab/destroy/{id_tanggung_jawab}', [\App\Http\Controllers\AnalisaTanggungJawabController::class, 'destroy'])->name('tanggung-jawab.destroy');

        // Wewenang
        Route::get('wewenang/{id_jabatan}', [\App\Http\Controllers\AnalisaWewenangController::class, 'index'])->name('wewenang.index');
        Route::get('wewenang/create/{id_jabatan}', [\App\Http\Controllers\AnalisaWewenangController::class, 'create'])->name('wewenang.create');
        Route::post('wewenang/store/{id_jabatan}', [\App\Http\Controllers\AnalisaWewenangController::class, 'store'])->name('wewenang.store');
        Route::get('wewenang/edit/{id_wewenang}', [\App\Http\Controllers\AnalisaWewenangController::class, 'edit'])->name('wewenang.edit');
        Route::put('wewenang/update/{id_wewenang}', [\App\Http\Controllers\AnalisaWewenangController::class, 'update'])->name('wewenang.update');
        Route::delete('wewenang/destroy/{id_wewenang}', [\App\Http\Controllers\AnalisaWewenangController::class, 'destroy'])->name('wewenang.destroy');

        // Korelasi Jabatan
        Route::get('korelasi-jabatan/{id_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'index'])->name('korelasi-jabatan.index');
        Route::get('korelasi-jabatan/create/{id_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'create'])->name('korelasi-jabatan.create');
        Route::post('korelasi-jabatan/store/{id_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'store'])->name('korelasi-jabatan.store');
        Route::get('korelasi-jabatan/edit/{id_korelasi_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'edit'])->name('korelasi-jabatan.edit');
        Route::put('korelasi-jabatan/update/{id_korelasi_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'update'])->name('korelasi-jabatan.update');
        Route::delete('korelasi-jabatan/destroy/{id_korelasi_jabatan}', [\App\Http\Controllers\AnalisaKorelasiJabatanController::class, 'destroy'])->name('korelasi-jabatan.destroy');

        // Kondisi Lingkungan Kerja
        Route::get('lingkungan-kerja/{id_jabatan}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'index'])->name('lingkungan-kerja.index');
        Route::get('lingkungan-kerja/create/{id_jabatan}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'create'])->name('lingkungan-kerja.create');
        Route::post('lingkungan-kerja/store/{id_jabatan}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'store'])->name('lingkungan-kerja.store');
        Route::get('lingkungan-kerja/edit/{id_lingkungan_kerja}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'edit'])->name('lingkungan-kerja.edit');
        Route::put('lingkungan-kerja/update/{id_lingkungan_kerja}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'update'])->name('lingkungan-kerja.update');
        Route::delete('lingkungan-kerja/destroy/{id_lingkungan_kerja}', [\App\Http\Controllers\AnalisaLingkunganKerjaController::class, 'destroy'])->name('lingkungan-kerja.destroy');

        // Resiko Bahaya
        Route::get('resiko-bahaya/{id_jabatan}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'index'])->name('resiko-bahaya.index');
        Route::get('resiko-bahaya/create/{id_jabatan}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'create'])->name('resiko-bahaya.create');
        Route::post('resiko-bahaya/store/{id_jabatan}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'store'])->name('resiko-bahaya.store');
        Route::get('resiko-bahaya/edit/{id_resiko_bahaya}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'edit'])->name('resiko-bahaya.edit');
        Route::put('resiko-bahaya/update/{id_resiko_bahaya}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'update'])->name('resiko-bahaya.update');
        Route::delete('resiko-bahaya/destroy/{id_resiko_bahaya}', [\App\Http\Controllers\AnalisaResikoBahayaController::class, 'destroy'])->name('resiko-bahaya.destroy');

        // Prestasi Kerja
        Route::get('prestasi-kerja/{id_jabatan}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'index'])->name('prestasi-kerja.index');
        Route::get('prestasi-kerja/create/{id_jabatan}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'create'])->name('prestasi-kerja.create');
        Route::post('prestasi-kerja/store/{id_jabatan}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'store'])->name('prestasi-kerja.store');
        Route::get('prestasi-kerja/edit/{id_prestasi_kerja}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'edit'])->name('prestasi-kerja.edit');
        Route::put('prestasi-kerja/update/{id_prestasi_kerja}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'update'])->name('prestasi-kerja.update');
        Route::delete('prestasi-kerja/destroy/{id_prestasi_kerja}', [\App\Http\Controllers\AnalisaPrestasiKerjaController::class, 'destroy'])->name('prestasi-kerja.destroy');
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

    // Ajax Section
    Route::group(['prefix' => 'fetch', 'as' => 'fetch.'], function () {
        Route::post('induk-jabatan', [\App\Http\Controllers\FetchDataController::class, 'fetchIndukJabatan'])->name('induk-jabatan');
    });
});

Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
    'confirm' => false, // Confirmasi Password Routes...
]);

 // Route::resource('permission', App\Http\Controllers\PermissionController::class);
 // Route::resource('role', App\Http\Controllers\RoleController::class);
