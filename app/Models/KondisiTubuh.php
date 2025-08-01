<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KondisiTubuh extends Model
{
    use HasFactory;

    protected $table = 'kondisi_tubuh';

    protected $fillable = ['kondisi'];

    public function rules()
    {
    return $this->hasMany(Rule::class);
    }

}
