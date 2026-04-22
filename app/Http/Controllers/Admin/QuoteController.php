<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,completed,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $quote->update($validated);

        return redirect()->route('admin.quotes.show', $quote)
            ->with('success', 'Statut mis à jour avec succès.');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')
            ->with('success', 'Devis supprimé avec succès.');
    }
}
