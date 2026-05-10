<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = ['judul', 'slug', 'deskripsi', 'kategori', 'video_url'];
}
