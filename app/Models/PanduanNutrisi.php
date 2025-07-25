<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanduanNutrisi extends Model
{
    use HasFactory;

    protected $table = 'panduan_nutrisi';

    protected $fillable = [
        'nama_makanan',
        'kategori',
        'energi',
        'protein',
        'lemak',
        'serat',
        'gambar_url',
    ];
}
