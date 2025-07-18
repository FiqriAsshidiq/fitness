<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihan';

    protected $fillable = [
        'kode',
        'nama_teknik',
        'alat',
        'kategori_otot',
    ];

    public function rekomendasi()
    {
        return $this->belongsToMany(Rekomendasi::class, 'latihan_rekomendasi');
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori_otot', $kategori);
    }
}
