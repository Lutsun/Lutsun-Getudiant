<?php
use Illuminate\Support\Facades\Route;

// Route de base
Route::get('/', function () {
    return view('dashboard');
});

// Etudiant Routes
Route::get('/etudiant/liste', [App\Http\Controllers\EtudiantController::class, 'liste'])->name('etudiant.liste');
Route::get('/etudiant/create', [App\Http\Controllers\EtudiantController::class, 'ajouter'])->name('etudiant.create');
Route::post('/etudiant/store', [App\Http\Controllers\EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/etudiant/edit/{id}', [App\Http\Controllers\EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/update/{id}', [App\Http\Controllers\EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/delete/{id}', [App\Http\Controllers\EtudiantController::class, 'destroy'])->name('etudiant.delete');

// Classe Routes 
Route::get('/classe/liste', [App\Http\Controllers\ClasseController::class, 'liste'])->name('classe.liste');
Route::get('/classe/create', [App\Http\Controllers\ClasseController::class, 'create'])->name('classe.create');
Route::post('/classe/store', [App\Http\Controllers\ClasseController::class, 'store'])->name('classe.store');
Route::get('/classe/edit/{id}', [App\Http\Controllers\ClasseController::class, 'edit'])->name('classe.edit');
Route::put('/classe/update/{id}', [App\Http\Controllers\ClasseController::class, 'update'])->name('classe.update');
Route::delete('/classe/delete/{id}', [App\Http\Controllers\ClasseController::class, 'destroy'])->name('classe.delete');