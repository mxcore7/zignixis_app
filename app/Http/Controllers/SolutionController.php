<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::where('is_active', true)->orderBy('order')->get();
        $odooModules = \App\Models\OdooModule::orderBy('order')->get();
        $offers = \App\Models\Offer::where('is_active', true)->orderBy('order')->get();
        
        return view('pages.solutions', compact('services', 'odooModules', 'offers'));
    }
}
