<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'classe_id',
        'date',
        'frais'
    ];

    protected $casts = [
        'date' => 'date',
        'frais' => 'decimal:2'
    ];

    // Relation avec l'étudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Relation avec la classe
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}