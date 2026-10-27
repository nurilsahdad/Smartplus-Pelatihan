<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get a setting value by key.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, ?string $value): self
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Normalize a phone number to WhatsApp international format (e.g. 628xxxxxxxx).
     */
    public static function formatPhoneForWhatsapp(?string $phone): string
    {
        if (empty($phone)) {
            return '';
        }

        // Remove spaces, hyphens, and other non-digits except leading plus
        $cleaned = preg_replace('/[^0-9+]/', '', trim($phone));

        if (str_starts_with($cleaned, '+62')) {
            $cleaned = substr($cleaned, 1); // remove +
        } elseif (str_starts_with($cleaned, '0')) {
            $cleaned = '62' . substr($cleaned, 1);
        } elseif (str_starts_with($cleaned, '8')) {
            $cleaned = '62' . $cleaned;
        }

        return $cleaned;
    }

    /**
     * Generate the complete WhatsApp URL.
     */
    public static function getWhatsappUrl(): string
    {
        $number = static::get('whatsapp_number', '');
        $formattedNumber = static::formatPhoneForWhatsapp($number);

        if (!empty($formattedNumber)) {
            return 'https://wa.me/' . $formattedNumber;
        }

        return 'https://wa.me/';
    }
}
