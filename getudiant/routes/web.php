<?php
use Illuminate\Support\Facades\Route;

// Route de base
Route::get('/', function () {
    return view('dashboard');
});

// Etudiant Routes
Route::get('/etudiant/liste', [App\Http\Controllers\EtudiantController::class, 'liste']);
Route::get('/etudiant/create', [App\Http\Controllers\EtudiantController::class, 'ajouter']);
Route::post('/save', [App\Http\Controllers\EtudiantController::class, 'store']);
Route::get('/etudiant/edit/{id}', [App\Http\Controllers\EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::post('/etudiant/update/{id}', [App\Http\Controllers\EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/delete/{id}', [App\Http\Controllers\EtudiantController::class, 'destroy'])->name('etudiant.delete');

// Classe Routes (à ajouter si vous voulez gérer les classes)
Route::get('/classes', [App\Http\Controllers\ClasseController::class, 'index'])->name('classes.index');
Route::get('/classe/create', [App\Http\Controllers\ClasseController::class, 'create'])->name('classe.create');
Route::post('/classe/store', [App\Http\Controllers\ClasseController::class, 'store'])->name('classe.store');
