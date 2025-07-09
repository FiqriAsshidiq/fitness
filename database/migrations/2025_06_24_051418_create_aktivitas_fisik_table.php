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
        Schema::create('aktivitas_fisik', function (Blueprint $table) {
            $table->id();
            $table->string('tingkat'); // contoh: Sedentary, Aktif, Sangat Aktif
            $table->decimal('nilai', 3, 2); // contoh: 1.2, 1.375, dst
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_fisik');
    }
};
