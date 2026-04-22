<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('order')->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'currency' => 'required|string|max:10',
            'billing_period' => 'required|string|max:50',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'button_text' => 'required|string|max:50',
            'button_url' => 'nullable|url|max:255',
            'color' => 'required|string|in:primary,secondary,accent,orange,purple',
            'order' => 'nullable|integer',
        ]);

        // Filter out empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], fn($f) => !empty(trim($f))));
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Offer::create($validated);

        return redirect()->route('admin.offers.index')
            ->with('success', 'Offre créée avec succès.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'currency' => 'required|string|max:10',
            'billing_period' => 'required|string|max:50',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'button_text' => 'required|string|max:50',
            'button_url' => 'nullable|url|max:255',
            'color' => 'required|string|in:primary,secondary,accent,orange,purple',
            'order' => 'nullable|integer',
        ]);

        // Filter out empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], fn($f) => !empty(trim($f))));
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $offer->update($validated);

        return redirect()->route('admin.offers.index')
            ->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('admin.offers.index')
            ->with('success', 'Offre supprimée avec succès.');
    }
}
