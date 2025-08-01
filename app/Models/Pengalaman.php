<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $fillable = ['level', 'deskripsi'];
    
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }

}


