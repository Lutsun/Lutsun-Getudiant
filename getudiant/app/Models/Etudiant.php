<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiants'; 

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'date_naissance',
        'telephone',
        'matricule',
        'classe_id'
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    // Relation avec la classe
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    // Relation avec les inscriptions
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    // Accessor pour le nom complet
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }
}