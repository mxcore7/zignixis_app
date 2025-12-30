<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('category', 'author')->latest()->paginate(9);
        $categories = \App\Models\Category::all();
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
