<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = \App\Models\Ticket::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
            
        return view('client.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('client.tickets.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'message' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'open';

        \App\Models\Ticket::create($validated);

        return redirect()->route('client.tickets.index')->with('success', 'Votre ticket a été créé avec succès.');
    }

}
