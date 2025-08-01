<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';
    protected $fillable = [
        
        'pengalaman_id',
        'tujuan_latihan_id',
        'kondisi_tubuh_id',
    ];

    public function pengalaman()
    {
        return $this->belongsTo(Pengalaman::class);
    }

    public function targetOtot()
    {
        return $this->belongsToMany(TargetOtot::class, 'rule_target_otot');
    }

    public function rekomendasi()
    {
        return $this->hasOne(Rekomendasi::class);
    }

    public function tujuanLatihan()
    {
        return $this->belongsTo(TujuanLatihan::class, 'tujuan_latihan_id');
    }

    public function kondisiTubuh()
    {
    return $this->belongsTo(KondisiTubuh::class);
    }


}


