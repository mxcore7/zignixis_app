<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::where('user_id', auth()->id())->latest()->take(5)->get();
        
        $activeProjectsCount = \App\Models\Project::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();

        // TODO: Implement Invoices/Hours Logic later
        
        return view('client.dashboard', compact('projects', 'activeProjectsCount'));
    }

}
