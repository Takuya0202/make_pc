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
        Schema::table('parts', function (Blueprint $table) {
            // categoryとmakerを削除
            $table->dropColumn('category');
            $table->dropColumn('maker');
        });
        Schema::table('parts', function (Blueprint $table) {
            // category_idとmaker_idを追加
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('maker_id')->constrained('makers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parts', function (Blueprint $table) {
            // rollbackしたときに
            $table->dropForeign(['category_id']);
            $table->dropForeign(['maker_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('maker_id');

            $table->string('category');
            $table->string('maker',50);
        });
    }
};
