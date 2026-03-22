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
        if (Schema::hasTable('users') && ! Schema::hasColumn('users', 'uuid')) {
            Schema::table('users', function (Blueprint $table) {
                $table->uuid()->after('id')->unique();
            });
        }

        if (Schema::hasTable('categories') && ! Schema::hasColumn('categories', 'uuid')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->uuid()->after('id')->unique();
            });
        }

        if (Schema::hasTable('tasks') && ! Schema::hasColumn('tasks', 'uuid')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->uuid()->after('id')->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'uuid')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }

        if (Schema::hasTable('categories') && Schema::hasColumn('categories', 'uuid')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }

        if (Schema::hasTable('tasks') && Schema::hasColumn('tasks', 'uuid')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
};
