<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfos = ContactInfo::orderBy('order')->get();
        return view('admin.contact-info.index', compact('contactInfos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|max:255|unique:contact_info,key',
            'value_fr' => 'nullable|string',
            'value_en' => 'nullable|string',
            'value_simple' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'type' => 'required|in:text,email,phone,address',
            'order' => 'nullable|integer',
            'is_translatable' => 'boolean',
        ]);

        $value = $request->has('is_translatable') 
            ? ['fr' => $validated['value_fr'] ?? '', 'en' => $validated['value_en'] ?? '']
            : $validated['value_simple'];

        ContactInfo::create([
            'key' => $validated['key'],
            'value' => $value,
            'icon' => $validated['icon'] ?? null,
            'type' => $validated['type'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Information de contact créée avec succès.');
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $validated = $request->validate([
            'value_fr' => 'nullable|string',
            'value_en' => 'nullable|string',
            'value_simple' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'type' => 'required|in:text,email,phone,address',
            'order' => 'nullable|integer',
            'is_translatable' => 'boolean',
        ]);

        $value = $request->has('is_translatable') 
            ? ['fr' => $validated['value_fr'] ?? '', 'en' => $validated['value_en'] ?? '']
            : $validated['value_simple'];

        $contactInfo->update([
            'value' => $value,
            'icon' => $validated['icon'] ?? null,
            'type' => $validated['type'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Information de contact mise à jour avec succès.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Information de contact supprimée avec succès.');
    }
}
