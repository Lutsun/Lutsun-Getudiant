<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'niveau',
        'effectif'
    ];

    // Relation avec les étudiants
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    // Relation avec le professeur (si une classe a un professeur responsable)
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}