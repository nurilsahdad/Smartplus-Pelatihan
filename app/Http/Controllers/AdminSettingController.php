<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    /**
     * Display settings page.
     */
    public function index()
    {
        $whatsappNumber = Setting::get('whatsapp_number', '');

        return view('admin.settings.index', compact('whatsappNumber'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'whatsapp_number' => ['nullable', 'string', 'max:25'],
        ], [
            'whatsapp_number.max' => 'Nomor WhatsApp maksimal 25 karakter.',
        ]);

        Setting::set('whatsapp_number', $validated['whatsapp_number'] ?? '');

        return redirect()->route('admin.settings.index')->with('success', 'Nomor WhatsApp tujuan berhasil disimpan!');
    }
}
