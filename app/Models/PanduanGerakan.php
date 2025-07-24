<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanduanGerakan extends Model
{
    protected $table = 'panduan_gerakan';

    protected $fillable = [
        'nama_gerakan',
        'target_otot',
        'deskripsi',
        'gif_url',
    ];
}
