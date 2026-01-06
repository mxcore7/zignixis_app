<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $campaigns = \App\Models\NewsletterCampaign::latest()->paginate(10);
        return view('admin.newsletter.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.newsletter.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $campaign = \App\Models\NewsletterCampaign::create([
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'status' => 'draft',
        ]);

        return redirect()->route('admin.newsletter.index')->with('success', 'Campagne créée (brouillon).');
    }

    public function edit(\App\Models\NewsletterCampaign $campaign)
    {
        return view('admin.newsletter.edit', compact('campaign'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\NewsletterCampaign $campaign)
    {
         $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $campaign->update($validated);

        return redirect()->route('admin.newsletter.index')->with('success', 'Campagne mise à jour.');
    }

    public function destroy(\App\Models\NewsletterCampaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('admin.newsletter.index')->with('success', 'Campagne supprimée.');
    }

    public function send(\App\Models\NewsletterCampaign $campaign)
    {
        if($campaign->status === 'sent') {
            return back()->with('error', 'Cette campagne a déjà été envoyée.');
        }

        $subscribers = \App\Models\Subscriber::where('status', 'active')->get();
        
        // Simulation of sending
        // In real app: dispatch job for each subscriber
        
        $campaign->update([
            'status' => 'sent',
            'sent_at' => now(),
            'recipients_count' => $subscribers->count(),
        ]);

        return redirect()->route('admin.newsletter.index')->with('success', 'Campagne envoyée à ' . $subscribers->count() . ' abonnés.');
    }

    public function subscribers()
    {
        $subscribers = \App\Models\Subscriber::latest()->paginate(20);
        return view('admin.newsletter.subscribers', compact('subscribers'));
    }

}
