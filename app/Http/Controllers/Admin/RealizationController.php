<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealizationController extends Controller
{
    public function index()
    {
        $realizations = Realization::orderBy('order')->get();
        return view('admin.realizations.index', compact('realizations'));
    }

    public function create()
    {
        return view('admin.realizations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'required|image|max:2048',
            'details' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('realizations', 'public');
        }

        Realization::create([
            'title' => [
                'fr' => $validated['title_fr'],
                'en' => $validated['title_en'],
            ],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'image' => $validated['image'],
            'details' => $validated['details'] ?? [],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.realizations.index')
            ->with('success', 'Réalisation créée avec succès.');
    }

    public function edit(Realization $realization)
    {
        return view('admin.realizations.edit', compact('realization'));
    }

    public function update(Request $request, Realization $realization)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'details' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $updateData = [
            'title' => [
                'fr' => $validated['title_fr'],
                'en' => $validated['title_en'],
            ],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'details' => $validated['details'] ?? [],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($realization->image) {
                Storage::disk('public')->delete($realization->image);
            }
            $updateData['image'] = $request->file('image')->store('realizations', 'public');
        }

        $realization->update($updateData);

        return redirect()->route('admin.realizations.index')
            ->with('success', 'Réalisation mise à jour avec succès.');
    }

    public function destroy(Realization $realization)
    {
        // Delete image
        if ($realization->image) {
            Storage::disk('public')->delete($realization->image);
        }

        $realization->delete();

        return redirect()->route('admin.realizations.index')
            ->with('success', 'Réalisation supprimée avec succès.');
    }
}
