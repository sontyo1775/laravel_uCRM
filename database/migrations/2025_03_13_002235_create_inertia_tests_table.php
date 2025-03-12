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
        Schema::create('inertia_tests', function (Blueprint $table) {
            $table->id();
            // 20250312 add No21 マイグレーション
            $table->string('title');
            // php artisan make:migration rename_contet_to_content_in_inertia_tests_table でmigrationファイル作成して編集
            $table->string('content');
            // 20250312 add No21 マイグレーション
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inertia_tests');
    }
};
