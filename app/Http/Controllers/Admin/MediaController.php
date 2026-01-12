<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::with('uploader')->latest();

        if ($request->filled('category')) {
            $query->category($request->category);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('filename', 'like', "%{$request->search}%")
                  ->orWhere('alt_text', 'like', "%{$request->search}%");
            });
        }

        $media = $query->paginate(24);
        $categories = ['blog', 'projects', 'general', 'partners', 'team'];
        
        return view('admin.media.index', compact('media', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|file|max:10240', // 10MB max
            'category' => 'nullable|string',
        ]);

        $uploadedMedia = [];

        foreach ($request->file('files') as $file) {
            $originalName = $file->getClientOriginalName();
            $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media', $filename, 'public');

            $media = Media::create([
                'name' => pathinfo($originalName, PATHINFO_FILENAME),
                'filename' => $filename,
                'path' => $path,
                'type' => str_starts_with($file->getMimeType(), 'image/') ? 'image' : 'document',
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'category' => $request->category ?? 'general',
                'uploaded_by' => auth()->id(),
            ]);

            $uploadedMedia[] = $media;
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'media' => $uploadedMedia,
                'message' => count($uploadedMedia) . ' fichier(s) uploadé(s) avec succès'
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', count($uploadedMedia) . ' fichier(s) uploadé(s) avec succès');
    }

    public function update(Request $request, Media $media)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alt_text' => 'nullable|string',
            'caption' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $media->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Média mis à jour avec succès'
        ]);
    }

    public function destroy(Media $media)
    {
        try {
            // Delete physical file manually
            if ($media->path && Storage::disk('public')->exists($media->path)) {
                try {
                    Storage::disk('public')->delete($media->path);
                } catch (\Exception $e) {
                    \Log::error('Failed to delete physical file: ' . $e->getMessage());
                }
            }

            // Use direct database deletion to bypass any Eloquent issues/silencing
            $deleted = \Illuminate\Support\Facades\DB::table('media')->where('id', $media->id)->delete();
            
            $check = \Illuminate\Support\Facades\DB::table('media')->where('id', $media->id)->first();
            \Log::info("Deleted result: $deleted. Item exists immediately after: " . ($check ? 'yes' : 'no'));

            if ($deleted) {
                if (request()->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Média supprimé avec succès'
                    ]);
                }
                return redirect()->back()->with('success', 'Média supprimé avec succès');
            } else {
                throw new \Exception('La suppression a échoué (DB returned 0 affected rows).');
            }
        } catch (\Exception $e) {
            \Log::error('Error deleting media: ' . $e->getMessage());
            
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de la suppression du média'
                ], 500);
            }
            return redirect()->back()->with('error', 'Erreur lors de la suppression du média.');
        }
    }
}
