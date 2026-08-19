<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = \App\Models\Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'title.fr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content.fr' => 'required|string',
            'content.en' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'meta_title.fr' => 'nullable|string|max:255',
            'meta_title.en' => 'nullable|string|max:255',
            'meta_description.fr' => 'nullable|string',
            'meta_description.en' => 'nullable|string',
            'meta_keywords.fr' => 'nullable|string',
            'meta_keywords.en' => 'nullable|string',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'is_active' => $request->boolean('is_active'),
            'title' => ['fr' => $validated['title']['fr'], 'en' => $validated['title']['en'] ?? $validated['title']['fr']],
            'content' => ['fr' => $validated['content']['fr'], 'en' => $validated['content']['en'] ?? null],
            'meta_title' => ['fr' => $validated['meta_title']['fr'] ?? null, 'en' => $validated['meta_title']['en'] ?? null],
            'meta_description' => ['fr' => $validated['meta_description']['fr'] ?? null, 'en' => $validated['meta_description']['en'] ?? null],
            'meta_keywords' => ['fr' => $validated['meta_keywords']['fr'] ?? null, 'en' => $validated['meta_keywords']['en'] ?? null],
        ];

        \App\Models\Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page créée avec succès.');
    }

    public function edit(\App\Models\Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Page $page)
    {
        $validated = $request->validate([
            'title.fr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content.fr' => 'required|string',
            'content.en' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'meta_title.fr' => 'nullable|string|max:255',
            'meta_title.en' => 'nullable|string|max:255',
            'meta_description.fr' => 'nullable|string',
            'meta_description.en' => 'nullable|string',
            'meta_keywords.fr' => 'nullable|string',
            'meta_keywords.en' => 'nullable|string',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'is_active' => $request->boolean('is_active'),
            'title' => ['fr' => $validated['title']['fr'], 'en' => $validated['title']['en'] ?? $validated['title']['fr']],
            'content' => ['fr' => $validated['content']['fr'], 'en' => $validated['content']['en'] ?? null],
            'meta_title' => ['fr' => $validated['meta_title']['fr'] ?? null, 'en' => $validated['meta_title']['en'] ?? null],
            'meta_description' => ['fr' => $validated['meta_description']['fr'] ?? null, 'en' => $validated['meta_description']['en'] ?? null],
            'meta_keywords' => ['fr' => $validated['meta_keywords']['fr'] ?? null, 'en' => $validated['meta_keywords']['en'] ?? null],
        ];

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page mise à jour avec succès.');
    }

    public function destroy(\App\Models\Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page supprimée.');
    }

}
