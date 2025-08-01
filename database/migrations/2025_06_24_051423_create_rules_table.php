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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengalaman_id')->constrained('pengalaman')->onDelete('cascade');
            $table->foreignId('tujuan_latihan_id')->constrained('tujuan_latihan')->onDelete('cascade');
            $table->foreignId('kondisi_tubuh_id')->constrained('kondisi_tubuh')->onDelete('cascade');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
