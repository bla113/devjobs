<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteCotroller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/vacantes', [VacanteCotroller::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteCotroller::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteCotroller::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteCotroller::class,'show'])->name('vacantes.show');
Route::get('/cantidatos/{vacante}', [CandidatoController::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('candidatos.index');
Route::get('/storage', function () {
    Artisan::call('storage:link');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Notificaciones

Route::get('/notificaciones',NotificacionController::class)->middleware(['auth', 'verified','rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
