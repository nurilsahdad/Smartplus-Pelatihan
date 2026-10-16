<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    protected $table = 'syllabuses';

    protected $fillable = [
        'program_id',
        'title',
        'description',
        'topics',
        'sort_order',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
