<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Afficher la liste des classes
     */
    public function liste()
    {
        // Pour l'exemple, on crée des données fictives
        $classes = [
            [
                'id' => 1,
                'nom' => 'Terminale S1',
                'code' => 'TS1',
                'niveau' => 'Terminale',
                'effectif' => 32,
                'enseignant' => 'M. Diallo',
                'salle' => 'Salle 101'
            ],
            [
                'id' => 2,
                'nom' => 'Première L',
                'code' => '1L',
                'niveau' => 'Première',
                'effectif' => 28,
                'enseignant' => 'Mme. Diop',
                'salle' => 'Salle 205'
            ],
            [
                'id' => 3,
                'nom' => 'BTS SIO',
                'code' => 'BTS-SIO',
                'niveau' => 'BTS',
                'effectif' => 24,
                'enseignant' => 'M. Ndiaye',
                'salle' => 'Lab Info 1'
            ]
        ];

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
            'code' => 'required|string|max:20',
            'niveau' => 'required|string',
        ]);

        // Ici vous ajouteriez la logique pour sauvegarder en base de données
        // Ex: $classe = Classe::create($request->all());
        
        // Pour l'exemple, on redirige vers la liste des classes
        return redirect()->route('classes.index')
            ->with('success', 'Classe créée avec succès!');
    }

    /**
     * Afficher le formulaire d'édition d'une classe
     */
    public function edit($id)
    {
        // Récupérer la classe à éditer
        // $classe = Classe::findOrFail($id);
        
        // Pour l'exemple, on crée une classe fictive
        $classe = [
            'id' => $id,
            'nom' => 'Terminale S1',
            'code' => 'TS1',
            'niveau' => 'Terminale',
            'salle' => 'Salle 101',
            'enseignant' => 'M. Diallo',
            'description' => 'Classe de sciences'
        ];
        
        return view('edit_classe', compact('classe'));
    }

    /**
     * Mettre à jour une classe
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:100',
            'code' => 'required|string|max:20',
            'niveau' => 'required|string',
        ]);

        // Ici vous ajouteriez la logique pour mettre à jour en base de données
        // Ex: $classe = Classe::findOrFail($id);
        //     $classe->update($request->all());
        
        return redirect()->route('classes.index')
            ->with('success', 'Classe mise à jour avec succès!');
    }

    /**
     * Supprimer une classe
     */
    public function destroy($id)
    {
        // Ici vous ajouteriez la logique pour supprimer
        // Ex: $classe = Classe::findOrFail($id);
        //     $classe->delete();
        
        return response()->json(['success' => true]);
    }
}