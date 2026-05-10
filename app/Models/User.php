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
        'email',
        'password',
        'role',
        'status',
        'sekolah',
        'jurusan',
        'match_score',
        'xp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isSiswa()
    {
        return $this->role === 'SISWA';
    }
    public function isPerusahaan()
    {
        return $this->role === 'PERUSAHAAN';
    }
    public function isLpk()
    {
        return $this->role === 'LPK';
    }
    public function isAdmin()
    {
        return $this->role === 'ADMIN';
    }

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }

    public function lpk()
    {
        return $this->hasOne(Lpk::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}