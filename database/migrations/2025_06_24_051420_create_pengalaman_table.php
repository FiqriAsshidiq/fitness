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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode');            
            $table->string('level')->unique(); // contoh: pemula, menengah, lanjutan
            $table->text('deskripsi')->nullable();
            $table->timestamps();       
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman');
    }
};
