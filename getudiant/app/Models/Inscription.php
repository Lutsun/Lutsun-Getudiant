<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'frais'];

    protected $casts = [
        'date' => 'date',
        'frais' => 'decimal:2',
    ];
}