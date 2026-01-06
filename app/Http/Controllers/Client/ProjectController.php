<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(\App\Models\Project $project)
    {
        // Security: Ensure user owns the project
        abort_if($project->user_id !== auth()->id(), 403);
        
        return view('client.projects.show', compact('project'));
    }

}
