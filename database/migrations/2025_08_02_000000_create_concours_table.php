<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('concours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('inscription')->nullable();
            $table->string('epreuve')->nullable();
            $table->text('description')->nullable();
            $table->string('filieres')->nullable();
            $table->string('places')->nullable();
            $table->string('conditions')->nullable();
            $table->string('site')->nullable();
            $table->string('status')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('concours');
    }
};

