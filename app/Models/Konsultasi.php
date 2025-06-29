<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $fillable = ['user_id', 'rekomendasi_id'];

    public function targetOtot()
    {
        return $this->belongsToMany(TargetOtot::class, 'konsultasi_target_otot');
    }

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
