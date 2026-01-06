<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => [
                'total' => \App\Models\Project::count(),
                'thisMonth' => \App\Models\Project::whereMonth('created_at', now()->month)->count(),
            ],
            'posts' => [
                'total' => \App\Models\Post::count(),
                'published' => \App\Models\Post::whereNotNull('published_at')->count(),
                'drafts' => \App\Models\Post::whereNull('published_at')->count(),
            ],
            'contacts' => [
                'total' => \App\Models\Contact::count(),
                'unread' => \App\Models\Contact::where('is_read', false)->count(),
                'thisWeek' => \App\Models\Contact::where('created_at', '>=', now()->startOfWeek())->count(),
            ],
            'partners' => \App\Models\Partner::where('is_active', true)->count(),
            'realizations' => \App\Models\Realization::where('is_active', true)->count(),
        ];

        // Recent activity (last 10 actions)
        $recentContacts = \App\Models\Contact::latest()->take(3)->get();
        $recentProjects = \App\Models\Project::latest()->take(3)->get();
        $recentPosts = \App\Models\Post::latest()->take(3)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentProjects', 'recentPosts'));
    }
}
