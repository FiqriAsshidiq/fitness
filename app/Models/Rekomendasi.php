<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi';

    protected $fillable = [
        'metode_latihan', 'keterangan','nutrisi','catatan', 'rule_id'
    ];

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    public function latihan()
    {
        return $this->belongsToMany(Latihan::class, 'latihan_rekomendasi');
    }

}

