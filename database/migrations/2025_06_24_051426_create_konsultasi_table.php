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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->float('bmr')->nullable(); 
            $table->float('tdee')->nullable(); 
            $table->float('kalori')->nullable(); 
            $table->float('protein')->nullable(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('aktivitas_fisik_id')->constrained('aktivitas_fisik')->onDelete('cascade');
            $table->foreignId('rekomendasi_id')->nullable()->constrained('rekomendasi')->onDelete('set null');
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
        Schema::dropIfExists('konsultasi');
    }
};
