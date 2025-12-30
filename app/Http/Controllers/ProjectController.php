<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::latest()->paginate(9);
        return view('pages.projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = \App\Models\Project::where('slug', $slug)->firstOrFail();
        return view('pages.project-detail', compact('project'));
    }
}
