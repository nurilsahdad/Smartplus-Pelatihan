<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'title',
        'date',
        'start_time',
        'end_time',
        'location',
        'speaker',
        'description',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected $appends = [
        'computed_status',
    ];

    public function getComputedStatusAttribute(): string
    {
        try {
            $tz = 'Asia/Jakarta';
            $now = \Carbon\Carbon::now($tz);
            
            $dateStr = \Carbon\Carbon::parse($this->date)->format('Y-m-d');
            $startStr = is_string($this->start_time) ? $this->start_time : \Carbon\Carbon::parse($this->start_time)->format('H:i:s');
            $endStr = is_string($this->end_time) ? $this->end_time : \Carbon\Carbon::parse($this->end_time)->format('H:i:s');

            $start = \Carbon\Carbon::parse($dateStr . ' ' . $startStr, $tz);
            $end = \Carbon\Carbon::parse($dateStr . ' ' . $endStr, $tz);

            if ($now->greaterThan($end)) {
                return 'selesai';
            }

            if ($now->greaterThanOrEqualTo($start) && $now->lessThanOrEqualTo($end)) {
                return 'berlangsung';
            }
        } catch (\Throwable $e) {
            // Fallback
        }

        return $this->attributes['status'] ?? 'mendatang';
    }

    public function getStatusAttribute($value): string
    {
        return $this->computed_status;
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
