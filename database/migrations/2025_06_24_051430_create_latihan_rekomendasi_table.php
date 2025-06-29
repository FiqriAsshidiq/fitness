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
        Schema::create('latihan_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('latihan_id')->constrained('latihan')->onDelete('cascade');
            $table->foreignId('rekomendasi_id')->constrained('rekomendasi')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latihan_rekomendasi');
    }
};
