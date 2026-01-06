<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        \App\Models\Subscriber::create([
            'email' => $validated['email'],
            'status' => 'active', // Direct activation for now, can add verification later
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Merci ! Vous êtes maintenant inscrit à notre newsletter.');
    }

}
