<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professeurs', function (Blueprint $table) {
            $table->id(); // Auto-incrément, clé primaire
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('email', 150)->unique();
            $table->string('telephone', 20)->nullable();
            $table->string('specialite', 100);
            $table->date('date_naissance')->nullable();
            $table->date('date_embauche');
            $table->string('adresse')->nullable();
            $table->enum('statut', ['actif', 'inactif', 'congé'])->default('actif');
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professeurs');
    }
};
