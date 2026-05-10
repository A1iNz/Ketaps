<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['nama_sektor', 'slug'];

    // Relasi: Satu sektor bisa memiliki banyak Lowongan Kerja (Job)
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}   