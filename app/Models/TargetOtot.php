<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetOtot extends Model
{
    use HasFactory;
    protected $table = 'target_otot';
    protected $fillable = ['kode', 'fokus'];

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'rule_target_otot');
    }

    public function konsultasi()
    {
        return $this->belongsToMany(Konsultasi::class, 'konsultasi_target_otot');
    }

}

