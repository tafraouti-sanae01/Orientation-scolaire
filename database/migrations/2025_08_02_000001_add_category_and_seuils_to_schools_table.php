<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            if (!Schema::hasColumn('schools', 'category')) {
                $table->string('category')->nullable()->after('fees');
            }
            if (!Schema::hasColumn('schools', 'seuils')) {
                $table->string('seuils')->nullable()->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            if (Schema::hasColumn('schools', 'seuils')) {
                $table->dropColumn('seuils');
            }
            if (Schema::hasColumn('schools', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};

