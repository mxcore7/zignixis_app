<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = \App\Models\Invoice::with(['user', 'project'])->latest('issue_date')->paginate(15);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $users = \App\Models\User::all(); // Should filter by role if needed
        $projects = \App\Models\Project::all();
        return view('admin.invoices.create', compact('users', 'projects'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_id' => 'nullable|exists:projects,id',
            'number' => 'required|string|unique:invoices,number',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,overdue',
        ]);

        \App\Models\Invoice::create($validated);

        return redirect()->route('admin.invoices.index')->with('success', 'Facture créée avec succès.');
    }

    public function edit(\App\Models\Invoice $invoice)
    {
        $users = \App\Models\User::all();
        $projects = \App\Models\Project::all();
        return view('admin.invoices.edit', compact('invoice', 'users', 'projects'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Invoice $invoice)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_id' => 'nullable|exists:projects,id',
            'number' => 'required|string|unique:invoices,number,' . $invoice->id,
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,overdue',
        ]);

        $invoice->update($validated);

        return redirect()->route('admin.invoices.index')->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy(\App\Models\Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Facture supprimée.');
    }

}
