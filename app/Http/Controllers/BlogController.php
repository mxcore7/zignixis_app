<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Post::with('category', 'author')->whereNotNull('published_at');

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title->fr', 'like', "%{$searchTerm}%")
                  ->orWhere('title->en', 'like', "%{$searchTerm}%")
                  ->orWhere('excerpt->fr', 'like', "%{$searchTerm}%")
                  ->orWhere('content->fr', 'like', "%{$searchTerm}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $category = \App\Models\Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $posts = $query->latest('published_at')->paginate(9);
        $categories = \App\Models\Category::withCount('posts')->get();
        
        return view('pages.blog', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::with('category', 'author')->where('slug', $slug)->firstOrFail();
        $relatedPosts = \App\Models\Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();
            
        return view('pages.blog-post', compact('post', 'relatedPosts'));
    }
}
