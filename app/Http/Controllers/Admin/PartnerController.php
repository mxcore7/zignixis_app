<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
            'website' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner créé avec succès.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        // Handle logo upload separately to avoid overwriting with null
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo) {
                try {
                    Storage::disk('public')->delete($partner->logo);
                } catch (\Exception $e) {
                    // Ignore missing file error
                }
            }
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        } else {
            // Remove logo from validated data to keep existing one
            unset($validated['logo']);
        }

        // Handle is_active separately (checkbox not sent when unchecked)
        $validated['is_active'] = $request->has('is_active');

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner mis à jour avec succès.');
    }

    public function destroy(Partner $partner)
    {
        // Delete logo
        if ($partner->logo) {
            try {
                Storage::disk('public')->delete($partner->logo);
            } catch (\Exception $e) {
                // Ignore missing file error
            }
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner supprimé avec succès.');
    }
}
