<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'user_id',
        'title',
        'company_name',
        'description',
        'location',
        'salary',
        'type',
        'status',
    ];

    public function user()
    {
        // Pastikan ini terhubung ke model User
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'APPROVED');
    }
    public function sector()
{
    return $this->belongsTo(Sector::class);
}
}