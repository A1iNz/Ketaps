<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'user_id',
        'jenis_perusahaan', // PT, CV, Yayasan, BUMN, dll
        'nama_perusahaan',
        'bidang_industri',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}