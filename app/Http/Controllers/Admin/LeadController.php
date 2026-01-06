<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('assignedUser')->latest()->get();
        $users = User::where('is_active', true)->get();
        
        $statuses = [
            'new' => ['label' => 'Nouveau', 'color' => 'blue'],
            'contacted' => ['label' => 'Contacté', 'color' => 'yellow'],
            'qualified' => ['label' => 'Qualifié', 'color' => 'purple'],
            'proposal' => ['label' => 'Proposition', 'color' => 'indigo'],
            'won' => ['label' => 'Gagné', 'color' => 'green'],
            'lost' => ['label' => 'Perdu', 'color' => 'red'],
        ];

        return view('admin.leads.index', compact('leads', 'users', 'statuses'));
    }

    public function create()
    {
        return view('admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'source' => 'required|string',
            'estimated_value' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        Lead::create($validated);

        return redirect()->back()->with('success', 'Lead créé avec succès');
    }

    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'status' => 'sometimes|required|string',
            'probability' => 'sometimes|integer|min:0|max:100',
            'notes' => 'sometimes|nullable|string',
            'estimated_value' => 'sometimes|nullable|numeric',
            'assigned_to' => 'sometimes|nullable|exists:users,id',
        ]);

        $lead->update($validated);

        // Auto-update timestamps based on status
        if ($request->has('status')) {
            switch ($request->status) {
                case 'contacted':
                    $lead->markAsContacted();
                    break;
                case 'qualified':
                    $lead->markAsQualified();
                    break;
                case 'won':
                    $lead->markAsWon();
                    break;
            }
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Lead mis à jour']);
        }

        return redirect()->back()->with('success', 'Lead mis à jour');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->back()->with('success', 'Lead supprimé');
    }
}
