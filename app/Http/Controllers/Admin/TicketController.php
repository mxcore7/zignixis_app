<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = \App\Models\Ticket::with('user')->latest()->paginate(15);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(\App\Models\Ticket $ticket)
    {
        $ticket->load('replies.user');
        return view('admin.tickets.show', compact('ticket'));
    }

    public function reply(\Illuminate\Http\Request $request, \App\Models\Ticket $ticket)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'status' => 'required|in:open,answered,closed',
        ]);

        $ticket->update(['status' => $validated['status']]);

        $ticket->replies()->create([
            'user_id' => auth()->id(),
            'message' => $validated['message'],
        ]);

        // Optional: Notify client logic here

        return redirect()->route('admin.tickets.show', $ticket)->with('success', 'Réponse envoyée avec succès.');
    }

}
