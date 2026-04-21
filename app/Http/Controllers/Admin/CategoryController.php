<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.fr' => 'required|string|max:255',
            'name.en' => 'nullable|string|max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'description.fr' => 'nullable|string',
            'description.en' => 'nullable|string',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'name' => ['fr' => $validated['name']['fr'], 'en' => $validated['name']['en'] ?? $validated['name']['fr']],
            'description' => ['fr' => $description['fr'] ?? null, 'en' => $description['en'] ?? null],
        ];

        Category::create($data);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Catégorie de blog créée avec succès.');
    }

    public function edit(Category $post_category)
    {
        return view('admin.categories.edit', ['category' => $post_category]);
    }

    public function update(Request $request, Category $post_category)
    {
        $validated = $request->validate([
            'name.fr' => 'required|string|max:255',
            'name.en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $post_category->id,
            'description.fr' => 'nullable|string',
            'description.en' => 'nullable|string',
        ]);

        $data = [
            'slug' => $validated['slug'],
            'name' => ['fr' => $validated['name']['fr'], 'en' => $validated['name']['en'] ?? $validated['name']['fr']],
            'description' => ['fr' => $validated['description']['fr'] ?? null, 'en' => $validated['description']['en'] ?? null],
        ];

        $post_category->update($data);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Catégorie de blog mise à jour avec succès.');
    }

    public function destroy(Category $post_category)
    {
        // Prevent deleting categories that have posts attached
        if ($post_category->posts()->count() > 0) {
            return redirect()->route('admin.post-categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des articles.');
        }

        $post_category->delete();

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Catégorie de blog supprimée avec succès.');
    }
}
