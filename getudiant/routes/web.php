<?php
use Illuminate\Support\Facades\Route;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Professeur;

// Route de base redirigeant vers le tableau de bord
Route::get('/', function () {
    // Nombre total d'étudiants
    $totalEtudiants = Etudiant::count();
    
    // Nombre total de classes
    $totalClasses = Classe::count();
    
    // Nombre total d'inscriptions
    $totalInscriptions = Inscription::count();
    
    // Nombre total de professeurs
    $totalProfesseurs = Professeur::where('statut', 'actif')->count();
    
    return view('dashboard', compact(
        'totalEtudiants',
        'totalClasses',
        'totalInscriptions',
        'totalProfesseurs'
    ));
})->name('dashboard');

// Etudiant Routes
Route::get('/etudiant/liste', [App\Http\Controllers\EtudiantController::class, 'liste'])->name('etudiant.liste');
Route::get('/etudiant/create', [App\Http\Controllers\EtudiantController::class, 'ajouter'])->name('etudiant.create');
Route::post('/save', [App\Http\Controllers\EtudiantController::class, 'store'])->name('etudiant.store');
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

// Inscription Routes
Route::get('/inscription/liste', [App\Http\Controllers\InscriptionController::class, 'liste'])->name('inscription.liste');
Route::get('/inscription/create', [App\Http\Controllers\InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription/store', [App\Http\Controllers\InscriptionController::class, 'store'])->name('inscription.store');
Route::get('/inscription/edit/{id}', [App\Http\Controllers\InscriptionController::class, 'edit'])->name('inscription.edit');
Route::put('/inscription/update/{id}', [App\Http\Controllers\InscriptionController::class, 'update'])->name('inscription.update');
Route::delete('/inscription/delete/{id}', [App\Http\Controllers\InscriptionController::class, 'destroy'])->name('inscription.delete');

// Professeur Routes
Route::get('/professeur/liste', [App\Http\Controllers\ProfesseurController::class, 'liste'])->name('professeur.liste');
Route::get('/professeur/create', [App\Http\Controllers\ProfesseurController::class, 'create'])->name('professeur.create');
Route::post('/professeur/store', [App\Http\Controllers\ProfesseurController::class, 'store'])->name('professeur.store');
Route::get('/professeur/edit/{id}', [App\Http\Controllers\ProfesseurController::class, 'edit'])->name('professeur.edit');
Route::put('/professeur/update/{id}', [App\Http\Controllers\ProfesseurController::class, 'update'])->name('professeur.update');
Route::delete('/professeur/delete/{id}', [App\Http\Controllers\ProfesseurController::class, 'destroy'])->name('professeur.delete');