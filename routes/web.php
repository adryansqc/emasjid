<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/search', [FrontendController::class, 'search'])->name('frontend.search');

Route::get('/saran', [FrontendController::class, 'saran'])->name('frontend.saran');
Route::post('/saran', [FrontendController::class, 'saranStore'])->name('frontend.saran.store');

Route::get('/alquran', [FrontendController::class, 'alquran'])->name('frontend.alquran');
Route::get('/alquran/{nomor}', [FrontendController::class, 'alquranDetail'])->name('frontend.alquran.detail');

// Route::get('/agenda-kegiatan', function () {
//     return view('fe.pages.kajian.kajian_page');
// });

Route::get('/agenda-kegiatan', [FrontendController::class, 'kajian'])->name('frontend.kajian');
Route::get('/agenda-kegiatan/{kajian}', [FrontendController::class, 'kajianDetail'])->name('frontend.kajian.detail');
Route::get('/berita-acara', [FrontendController::class, 'pengumuman'])->name('frontend.pengumuman');
Route::get('/berita-acara/{pengumuman}', [FrontendController::class, 'pengumumanDetail'])->name('frontend.pengumuman.detail');
