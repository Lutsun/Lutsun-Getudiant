<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;

class EtudiantController extends Controller
{
    public function ajouter()
    {
        // Récupérer toutes les classes pour le formulaire
        $classes = Classe::all();
        return view('etudiant.create', compact('classes'));
    }

    public function liste()
    {
        // Récupérer tous les étudiants avec leur classe
        $etudiants = Etudiant::with('classe')->get();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
            'matricule' => 'nullable|string|max:50|unique:etudiants',
            'classe_id' => 'nullable|exists:classes,id'
        ]);

        // Générer un matricule si non fourni
        if (!$request->matricule) {
            $request->merge([
                'matricule' => 'SIDK' . date('Y') . str_pad(Etudiant::count() + 1, 3, '0', STR_PAD_LEFT)
            ]);
        }

        // Créer l'étudiant
        $etudiant = Etudiant::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'matricule' => $request->matricule,
            'classe_id' => $request->classe_id
        ]);

        // Mettre à jour l'effectif de la classe si une classe est assignée
        if ($request->classe_id) {
            $classe = Classe::find($request->classe_id);
            $classe->increment('effectif');
        }

        return redirect('etudiant/liste')
            ->with('success', 'Étudiant ajouté avec succès!');
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $classes = Classe::all();
        return view('etudiant.edit', compact('etudiant', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        
        // Ancienne classe
        $oldClasseId = $etudiant->classe_id;
        
        // Validation
        $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
            'matricule' => 'nullable|string|max:50|unique:etudiants,matricule,' . $id,
            'classe_id' => 'nullable|exists:classes,id'
        ]);

        // Mettre à jour l'étudiant
        $etudiant->update($request->all());

        // Mettre à jour les effectifs des classes
        if ($oldClasseId != $request->classe_id) {
            // Décrémenter l'ancienne classe
            if ($oldClasseId) {
                $oldClasse = Classe::find($oldClasseId);
                if ($oldClasse && $oldClasse->effectif > 0) {
                    $oldClasse->decrement('effectif');
                }
            }
            
            // Incrémenter la nouvelle classe
            if ($request->classe_id) {
                $newClasse = Classe::find($request->classe_id);
                if ($newClasse) {
                    $newClasse->increment('effectif');
                }
            }
        }

        return redirect('/etudiant/liste')
            ->with('success', 'Étudiant modifié avec succès!');
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        
        // Décrémenter l'effectif de la classe avant suppression
        if ($etudiant->classe_id) {
            $classe = Classe::find($etudiant->classe_id);
            if ($classe && $classe->effectif > 0) {
                $classe->decrement('effectif');
            }
        }
        
        $etudiant->delete();
        
        return response()->json(['success' => true]);
    }
}
