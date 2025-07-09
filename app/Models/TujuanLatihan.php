<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanLatihan extends Model
{
    use HasFactory;

    protected $table = 'tujuan_latihan';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];

        public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class, 'tujuan_latihan_id');
    }

    public function rules()
    {
        return $this->hasMany(Rule::class, 'tujuan_latihan_id');
    }

    // Tambahan relasi jika nanti dibutuhkan
    // public function konsultasi()
    // {
    //     return $this->hasMany(Konsultasi::class);
    // }
}
