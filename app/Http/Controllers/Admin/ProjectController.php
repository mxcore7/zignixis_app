<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'required|max:255',
            'slug' => 'required|unique:projects,slug|max:255',
            'client_name' => 'nullable|string|max:255',
            'sector' => 'required|string|max:255',
            'description_fr' => 'required',
            'description_en' => 'required',
            'solution_fr' => 'nullable|string',
            'solution_en' => 'nullable|string',
            'results_fr' => 'nullable|string',
            'results_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        \App\Models\Project::create([
            'title' => [
                'fr' => $validated['title_fr'],
                'en' => $validated['title_en'],
            ],
            'slug' => $validated['slug'],
            'client_name' => $validated['client_name'],
            'sector' => $validated['sector'],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'solution' => [
                'fr' => $validated['solution_fr'] ?? '',
                'en' => $validated['solution_en'] ?? '',
            ],
            'results' => [
                'fr' => $validated['results_fr'] ?? '',
                'en' => $validated['results_en'] ?? '',
            ],
            'featured_image' => $validated['featured_image'] ?? null,
            'published_at' => $validated['published_at'],
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function show(string $id)
    {
        // Not used
    }

    public function edit(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $project = \App\Models\Project::findOrFail($id);

        $validated = $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'required|max:255',
            'slug' => 'required|max:255|unique:projects,slug,' . $project->id,
            'client_name' => 'nullable|string|max:255',
            'sector' => 'required|string|max:255',
            'description_fr' => 'required',
            'description_en' => 'required',
            'solution_fr' => 'nullable|string',
            'solution_en' => 'nullable|string',
            'results_fr' => 'nullable|string',
            'results_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $updateData = [
            'title' => [
                'fr' => $validated['title_fr'],
                'en' => $validated['title_en'],
            ],
            'slug' => $validated['slug'],
            'client_name' => $validated['client_name'],
            'sector' => $validated['sector'],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'solution' => [
                'fr' => $validated['solution_fr'] ?? '',
                'en' => $validated['solution_en'] ?? '',
            ],
            'results' => [
                'fr' => $validated['results_fr'] ?? '',
                'en' => $validated['results_en'] ?? '',
            ],
            'published_at' => $validated['published_at'],
        ];

        if ($request->hasFile('image')) {
            if ($project->featured_image && $project->featured_image !== 'projects/default.jpg') {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('image')->store('projects', 'public');
            $updateData['featured_image'] = $path;
        }

        $project->update($updateData);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        
        if ($project->featured_image && $project->featured_image !== 'projects/default.jpg') {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->featured_image);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
