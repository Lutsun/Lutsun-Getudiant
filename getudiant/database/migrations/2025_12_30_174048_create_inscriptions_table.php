<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')
                  ->constrained('etudiants')
                  ->onDelete('cascade'); // Si on supprime un étudiant, on supprime ses inscriptions
            $table->foreignId('classe_id')
                  ->constrained('classes')
                  ->onDelete('cascade'); // Si on supprime une classe, on supprime ses inscriptions
            $table->date('date');
            $table->decimal('frais', 10, 2); // 10 chiffres au total, 2 après la virgule
            $table->timestamps();
            
            // Optionnel : empêcher les doublons (un étudiant ne peut s'inscrire qu'une fois à une classe)
            $table->unique(['etudiant_id', 'classe_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};