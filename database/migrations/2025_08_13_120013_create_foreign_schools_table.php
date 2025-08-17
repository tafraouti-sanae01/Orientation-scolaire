<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('foreign_schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->boolean('is_free')->default(false);
            $table->text('description');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('admission_requirements')->nullable();
            $table->string('language_requirements')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('foreign_schools');
    }
};