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
        Schema::table('users', function (Blueprint $table) {
            // Étape 1: Niveau Bac
            if (!Schema::hasColumn('users', 'bac_level')) {
                $table->string('bac_level')->nullable();
            }
            
            // Étape 2: Langue Bac
            if (!Schema::hasColumn('users', 'bac_lang')) {
                $table->string('bac_lang')->nullable();
            }
            
            // Étape 3: Filière Bac
            if (!Schema::hasColumn('users', 'bac_field')) {
                $table->string('bac_field')->nullable();
            }
            
            // Étape 4: Préférences
            if (!Schema::hasColumn('users', 'university_type')) {
                $table->string('university_type')->nullable();
            }
            if (!Schema::hasColumn('users', 'services')) {
                $table->json('services')->nullable(); // Array des services
            }
            if (!Schema::hasColumn('users', 'budget')) {
                $table->string('budget')->nullable();
            }
            if (!Schema::hasColumn('users', 'study_abroad')) {
                $table->string('study_abroad')->nullable();
            }
            if (!Schema::hasColumn('users', 'cities')) {
                $table->text('cities')->nullable(); // String des villes séparées par virgules
            }
            if (!Schema::hasColumn('users', 'languages')) {
                $table->json('languages')->nullable(); // Array des langues
            }
            
            // Étape 5: Informations
            if (!Schema::hasColumn('users', 'prenom')) {
                $table->string('prenom')->nullable();
            }
            if (!Schema::hasColumn('users', 'school')) {
                $table->string('school')->nullable();
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age')->nullable();
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable();
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable();
            }
            if (!Schema::hasColumn('users', 'school_type')) {
                $table->string('school_type')->nullable();
            }
            if (!Schema::hasColumn('users', 'bac_obtenu')) {
                $table->string('bac_obtenu')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'bac_level',
                'bac_lang', 
                'bac_field',
                'university_type',
                'services',
                'budget',
                'study_abroad',
                'cities',
                'languages',
                'prenom',
                'school',
                'age',
                'city',
                'gender',
                'school_type',
                'bac_obtenu'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
