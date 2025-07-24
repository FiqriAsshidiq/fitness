<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'jenis_kelamin',
        'berat_badan',
        'tinggi_badan',
        'usia',
        'email',
        'telphone',
        'password',
        'role_id',
        'foto_member',
    ];

    protected $hidden = [
        'name',
        'email',
        'Telphone',
        'password',
        'remember_token',
    ];

    // Pastikan relasi role sudah benar
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Sesuaikan dengan kolom role_id
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
