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
        Schema::create('panduan_gerakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gerakan');
            $table->string('target_otot');
            $table->text('deskripsi')->nullable();
            $table->string('gif_url')->nullable(); 
            $table->timestamps();       
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panduan');
    }
};
