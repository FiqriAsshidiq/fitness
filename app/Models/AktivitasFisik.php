<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasFisik extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_fisik';

    protected $fillable = ['tingkat', 'nilai'];

    // Jika nanti konsultasi akan memiliki relasi ke aktivitas_fisik
    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }
}
