<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            // Ajouter la colonne professeur_id
            $table->foreignId('professeur_id')->nullable()->after('effectif');
            
            // Ajouter la contrainte de clé étrangère
            $table->foreign('professeur_id')
                  ->references('id')
                  ->on('professeurs')
                  ->onDelete('SET NULL');
        });
    }

    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère d'abord
            $table->dropForeign(['professeur_id']);
            
            // Supprimer la colonne
            $table->dropColumn('professeur_id');
        });
    }
};
