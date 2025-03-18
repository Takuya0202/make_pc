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
        Schema::create('pc_list_part', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pc_list_id');
            $table->foreign('pc_list_id')->references('id')->on('pc_lists')->onDelete('cascade');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc_list_part');
    }
};
