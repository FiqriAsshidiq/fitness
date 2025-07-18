<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
protected $fillable = [
        'user_id',
        'pengalaman_id',
        'rekomendasi_id',
        'tujuan_latihan_id',
        'aktivitas_fisik_id',
        'jenis_kelamin',
        'berat_badan',
        'tinggi_badan',
        'usia',
        'bmr',
        'tdee',
        'kalori',
        'protein',
    ];

    public function targetOtot()
    {
        return $this->belongsToMany(TargetOtot::class, 'konsultasi_target_otot');
    }

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class);
    }

    public function pengalaman()
    {
        return $this->belongsTo(Pengalaman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tujuanLatihan()
    {
    return $this->belongsTo(TujuanLatihan::class, 'tujuan_latihan_id'); 
    }

    public function aktivitasFisik()
    {
        return $this->belongsTo(AktivitasFisik::class);
    }


}
