<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'specialite',
        'date_naissance',
        'date_embauche',
        'adresse',
        'statut'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_embauche' => 'date',
    ];

    // Accessor pour le nom complet
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    // Relation avec les classes (si un professeur peut avoir plusieurs classes)
    public function classes()
    {
        return $this->hasMany(Classe::class, 'professeur_id');
    }
}
