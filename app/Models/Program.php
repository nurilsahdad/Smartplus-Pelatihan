<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'image',
        'description',
        'price',
        'duration',
        'level',
        'badge',
        'status',
    ];

    public function syllabuses()
    {
        return $this->hasMany(Syllabus::class)->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class)->orderBy('date', 'asc')->orderBy('start_time', 'asc');
    }
}
