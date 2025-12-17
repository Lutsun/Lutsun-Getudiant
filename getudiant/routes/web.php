<?php
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //  $prenom= 'Serge';
//     $tabetudiant = ['Serge', 'Mamour', 'Mouhamed', 'Ibrahima'];
//     return view('welcome', compact('tabetudiant'));
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

// Etudiant Routes
Route::get('/etudiant/liste', [App\Http\Controllers\EtudiantController::class, 'liste']);
Route::get('/etudiant/create', [App\Http\Controllers\EtudiantController::class, 'ajouter']);
Route::post('/save', [App\Http\Controllers\EtudiantController::class, 'etudiant.store']);
Route::put('/update', [App\Http\Controllers\EtudiantController::class, 'update']);

// classe Routes
Route::get('/classe/create', [App\Http\Controllers\ClasseController::class, 'create']);
Route::get('/classe/liste', [App\Http\Controllers\ClasseController::class, 'liste']);
Route::get('/edit/{prenom}', function ($prenom) {
    return view('update', compact('prenom'));
});



