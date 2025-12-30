<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = \App\Models\Post::with('category')->latest()->take(3)->get();
        $featuredProjects = \App\Models\Project::latest()->take(6)->get();
        $partners = \App\Models\Partner::active()->ordered()->get();
        
        return view('pages.home', compact('latestPosts', 'featuredProjects', 'partners'));
    }
}
