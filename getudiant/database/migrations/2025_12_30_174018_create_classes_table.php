<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Auto-incrément, clé primaire
            $table->string('nom', 100);
            $table->string('niveau', 50);
            $table->integer('effectif')->default(0);
            $table->foreignId('professeur_id')->nullable()->constrained('professeurs')->onDelete('SET NULL');   
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};