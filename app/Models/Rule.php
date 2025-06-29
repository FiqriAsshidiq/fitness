<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';

    public function targetOtot()
    {
        return $this->belongsToMany(TargetOtot::class, 'rule_target_otot');
    }

    public function rekomendasi()
    {
        return $this->hasOne(Rekomendasi::class);
    }

}


