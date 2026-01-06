<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = \App\Models\Invoice::where('user_id', auth()->id())
            ->latest('issue_date')
            ->paginate(10);
            
        return view('client.invoices.index', compact('invoices'));
    }

    public function show(\App\Models\Invoice $invoice)
    {
        abort_if($invoice->user_id !== auth()->id(), 403);
        
        // In a real app, this would stream a PDF
        // return response()->file(storage_path('app/' . $invoice->file_path));
        
        return view('client.invoices.show', compact('invoice'));
    }

}
