<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('category', 'author')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.fr' => 'required|max:255',
            'title.en' => 'nullable|max:255',
            'slug' => 'required|unique:posts,slug|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt.fr' => 'nullable|string',
            'excerpt.en' => 'nullable|string',
            'content.fr' => 'required',
            'content.en' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'category_id' => $validated['category_id'],
            'published_at' => $validated['published_at'],
            'author_id' => auth()->id() ?? 1,
            'title' => ['fr' => $validated['title']['fr'], 'en' => $validated['title']['en'] ?? $validated['title']['fr']],
            'excerpt' => ['fr' => $validated['excerpt']['fr'], 'en' => $validated['excerpt']['en'] ?? null],
            'content' => ['fr' => $validated['content']['fr'], 'en' => $validated['content']['en'] ?? null],
        ];

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $data['featured_image'] = $path;
        }

        \App\Models\Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article créé avec succès.');
    }

    public function show(string $id)
    {
        // Not used in admin panel usually, or could show preview
    }

    public function edit(string $id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $post = \App\Models\Post::findOrFail($id);

        $validated = $request->validate([
            'title.fr' => 'required|max:255',
            'title.en' => 'nullable|max:255',
            'slug' => 'required|max:255|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt.fr' => 'nullable|string',
            'excerpt.en' => 'nullable|string',
            'content.fr' => 'required',
            'content.en' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'category_id' => $validated['category_id'],
            'published_at' => $validated['published_at'],
            'title' => ['fr' => $validated['title']['fr'], 'en' => $validated['title']['en'] ?? $validated['title']['fr']],
            'excerpt' => ['fr' => $validated['excerpt']['fr'], 'en' => $validated['excerpt']['en'] ?? null],
            'content' => ['fr' => $validated['content']['fr'], 'en' => $validated['content']['en'] ?? null],
        ];

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('featured_image')->store('posts', 'public');
            $data['featured_image'] = $path;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $post = \App\Models\Post::findOrFail($id);
        
        if ($post->featured_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->featured_image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Article supprimé avec succès.');
    }
}
