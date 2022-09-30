<?php

use App\Models\Surat;
use App\Models\KategoriSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriSuratController;

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
Route::get('/dashboard/arsip/detail', function () {
    return view('dashboard.arsip.details');
});

Route::get('/dashboard/about', function () {
    return view('dashboard.about.index');
});

Route::resource('/dashboard/kategori-arsip', KategoriSuratController::class)->middleware('auth');

Route::get('/dashboard/arsip/detail/{surat}', [SuratController::class, 'showDetail'])->middleware('auth');

Route::resource('/dashboard/arsip', SuratController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'surat' => Surat::all()->count(),
        'kategori' => KategoriSurat::all()->count(),
        'undangan' => Surat::where('kategori_surat_id', 1)->count(),
        'pengumuman' => Surat::where('kategori_surat_id', 2)->count(),
        'notadinas' => Surat::where('kategori_surat_id', 3)->count(),
        'pemberitahuan' => Surat::where('kategori_surat_id', 4)->count(),
    ]);
})->middleware('auth');

Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register',[RegisterController::class,'store']);

Route::get('/register', [RegisterController::class,'index']);
