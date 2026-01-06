<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;

class ProfesseurController extends Controller
{
    /**
     * Afficher la liste des professeurs
     */
    public function liste()
    {
        $professeurs = Professeur::orderBy('nom')->orderBy('prenom')->get();
        return view('professeur.liste', compact('professeurs'));
    }

    /**
     * Afficher le formulaire de création d'un professeur
     */
    public function create()
    {
        return view('professeur.create');
    }

    /**
     * Enregistrer un nouveau professeur
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:professeurs',
            'telephone' => 'nullable|string|max:20',
            'specialite' => 'required|string|max:100',
            'date_naissance' => 'nullable|date',
            'date_embauche' => 'required|date',
            'adresse' => 'nullable|string|max:255',
            'statut' => 'required|in:actif,inactif,congé'
        ]);

        // Créer le professeur
        Professeur::create($request->all());

        return redirect()->route('professeur.liste')
            ->with('success', 'Professeur créé avec succès!');
    }

    /**
     * Afficher le formulaire d'édition d'un professeur
     */
    public function edit($id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('professeur.edit', compact('professeur'));
    }

    /**
     * Mettre à jour un professeur
     */
    public function update(Request $request, $id)
    {
        $professeur = Professeur::findOrFail($id);
        
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:professeurs,email,' . $id,
            'telephone' => 'nullable|string|max:20',
            'specialite' => 'required|string|max:100',
            'date_naissance' => 'nullable|date',
            'date_embauche' => 'required|date',
            'adresse' => 'nullable|string|max:255',
            'statut' => 'required|in:actif,inactif,congé'
        ]);

        // Mettre à jour le professeur
        $professeur->update($request->all());

        return redirect()->route('professeur.liste')
            ->with('success', 'Professeur mis à jour avec succès!');
    }

    /**
     * Supprimer un professeur
     */
    public function destroy($id)
    {
        $professeur = Professeur::findOrFail($id);
        
        // Vérifier si le professeur a des classes assignées
        if ($professeur->classes()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de supprimer ce professeur car il est assigné à ' . $professeur->classes()->count() . ' classe(s).'
            ], 400);
        }
        
        // Supprimer le professeur
        $professeur->delete();
        
        return response()->json(['success' => true]);
    }
}