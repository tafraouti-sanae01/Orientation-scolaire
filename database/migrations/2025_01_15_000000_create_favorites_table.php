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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // 'ecole' ou 'concours'
            $table->string('item_id'); // ID de l'école ou concours
            $table->string('item_name'); // Nom de l'école ou concours
            $table->string('item_category'); // Catégorie (ingenieur, commerce, etc.)
            $table->text('item_description')->nullable(); // Description
            $table->timestamps();
            
            // Index pour éviter les doublons
            $table->unique(['user_id', 'type', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
}; 