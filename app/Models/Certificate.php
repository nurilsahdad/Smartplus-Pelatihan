<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'enrollment_id',
        'certificate_number',
        'verification_code',
        'program_name',
        'program_slug',
        'issue_date',
        'predicate',
        'signed_by',
        'status',
        'file_path',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    /**
     * Helper untuk membuat nomor sertifikat yang unik dan terstandar
     */
    public static function generateCertificateNumber($programSlug = null)
    {
        $year = date('Y');
        $month = date('m');
        $prefix = 'CERT/SP/' . $year . '/' . $month;
        $count = self::whereYear('created_at', $year)->count() + 1;
        $seq = str_pad($count, 4, '0', STR_PAD_LEFT);
        
        $number = "{$prefix}/{$seq}";

        // Pastikan tidak duplikat
        while (self::where('certificate_number', $number)->exists()) {
            $count++;
            $seq = str_pad($count, 4, '0', STR_PAD_LEFT);
            $number = "{$prefix}/{$seq}";
        }

        return $number;
    }

    /**
     * Helper untuk membuat kode verifikasi unik
     */
    public static function generateVerificationCode()
    {
        do {
            $code = 'SP-' . strtoupper(Str::random(10));
        } while (self::where('verification_code', $code)->exists());

        return $code;
    }

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset($this->file_path) : null;
    }

    public function isPdf()
    {
        return $this->file_path && strtolower(pathinfo($this->file_path, PATHINFO_EXTENSION)) === 'pdf';
    }

    public function isImage()
    {
        $ext = strtolower(pathinfo($this->file_path ?? '', PATHINFO_EXTENSION));
        return in_array($ext, ['jpg', 'jpeg', 'png', 'webp']);
    }
}
