<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if (!$setting) {
                continue;
            }

            // Handle file uploads
            if ($request->hasFile($key)) {
                // Delete old file if exists
                if ($setting->value && is_string($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }
                $value = $request->file($key)->store('settings', 'public');
            }

            // Handle translatable fields
            if ($setting->type === 'translatable_text') {
                $value = [
                    'fr' => $request->input($key . '_fr', ''),
                    'en' => $request->input($key . '_en', ''),
                ];
            }

            $setting->update(['value' => $value]);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Paramètres mis à jour avec succès.');
    }

    public function updateSocial(Request $request)
    {
        $validated = $request->validate([
            'social_facebook' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_youtube' => 'nullable|url',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => 'text',
                    'group' => 'social',
                ]
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Liens sociaux mis à jour avec succès.');
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'site_logo' => 'nullable|image|max:2048',
            'site_favicon' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('site_logo')) {
            $setting = Setting::where('key', 'site_logo')->first();
            if ($setting && $setting->value) {
                Storage::disk('public')->delete($setting->value);
            }
            
            $logoPath = $request->file('site_logo')->store('settings', 'public');
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath, 'type' => 'image', 'group' => 'general']
            );
        }

        if ($request->hasFile('site_favicon')) {
            $setting = Setting::where('key', 'site_favicon')->first();
            if ($setting && $setting->value) {
                Storage::disk('public')->delete($setting->value);
            }
            
            $faviconPath = $request->file('site_favicon')->store('settings', 'public');
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath, 'type' => 'image', 'group' => 'general']
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Logo mis à jour avec succès.');
    }
}
