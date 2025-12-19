<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Classe;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function liste()
    {
        $inscriptions = Inscription::with(['etudiant', 'classe'])->get();
        return view('inscription.liste', compact('inscriptions'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $classes = Classe::all();
        return view('inscription.create', compact('etudiants', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'classe_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'frais' => 'required|numeric|min:0'
        ]);

        Inscription::create($request->all());

        return redirect()->route('inscription.liste')
            ->with('success', 'Inscription créée avec succès.');
    }

    public function edit($id)
    {
        $inscription = Inscription::findOrFail($id);
        $etudiants = Etudiant::all();
        $classes = Classe::all();
        
        return view('inscription.edit', compact('inscription', 'etudiants', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'classe_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'frais' => 'required|numeric|min:0'
        ]);

        $inscription = Inscription::findOrFail($id);
        $inscription->update($request->all());

        return redirect()->route('inscription.liste')
            ->with('success', 'Inscription mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->delete();

        return response()->json(['success' => true]);
    }
}