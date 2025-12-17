<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    /**
     * Afficher la liste des classes
     */
    public function liste()
    {
        $classes = Classe::orderBy('nom')->get();
        return view('classe.liste', compact('classes'));
    }

    /**
     * Afficher le formulaire de création d'une classe
     */
    public function create()
    {
        return view('classe.create');
    }

    /**
     * Enregistrer une nouvelle classe
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:100',
            'niveau' => 'required|string|max:50'
        ]);

        // Créer la classe avec effectif à 0
        Classe::create([
            'nom' => $request->nom,
            'niveau' => $request->niveau,
            'effectif' => 0
        ]);

        return redirect()->route('classe.liste')
            ->with('success', 'Classe créée avec succès!');
    }

    /**
     * Afficher le formulaire d'édition d'une classe
     */
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classe.edit', compact('classe'));
    }

    /**
     * Mettre à jour une classe
     */
    public function update(Request $request, $id)
    {
        $classe = Classe::findOrFail($id);
        
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:100',
            'niveau' => 'required|string|max:50'
        ]);

        // Mettre à jour la classe 
        $classe->update([
            'nom' => $request->nom,
            'niveau' => $request->niveau
            // L'effectif n'est pas modifié ici, il est mis à jour automatiquement
        ]);

        return redirect()->route('classe.liste')
            ->with('success', 'Classe mise à jour avec succès!');
    }

    /**
     * Supprimer une classe
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        
        // Vérifier si la classe a des étudiants
        if ($classe->effectif > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de supprimer cette classe car elle contient ' . $classe->effectif . ' étudiant(s).'
            ], 400);
        }
        
        // Supprimer la classe
        $classe->delete();
        
        return response()->json(['success' => true]);
    }
}