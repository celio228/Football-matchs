<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('creation_year');
            $table->integer('player_count');
            $table->string('logo')->nullable();
            $table->text('description')->nullable(); // Ajout de la colonne description
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Ajout de la clé étrangère pour l'utilisateur
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
