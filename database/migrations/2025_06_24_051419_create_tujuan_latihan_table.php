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
        Schema::create('tujuan_latihan', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();         // contoh: TL1, TL2, dll
            $table->string('nama');                   // contoh: Fat Loss, Bulking, Maintenance
            $table->text('deskripsi')->nullable();    // opsional penjelasan
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuan_latihan');
    }
};
