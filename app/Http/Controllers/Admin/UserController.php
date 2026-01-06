<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $permissions = self::getAvailablePermissions();
        return view('admin.users.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('User store initiated', $request->all());

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string',
            ]);

            \Illuminate\Support\Facades\Log::info('Validation passed');

            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
            $validated['is_active'] = $request->has('is_active');
            $validated['permissions'] = $request->input('permissions', []);

            // Handle profile photo upload
            if ($request->hasFile('profile_photo')) {
                $path = $request->file('profile_photo')->store('users', 'public');
                $validated['profile_photo'] = $path;
            }

            $user = \App\Models\User::create($validated);
            
            \Illuminate\Support\Facades\Log::info('User created', ['id' => $user->id]);

            return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error creating user: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        // Not used
    }

    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $permissions = self::getAvailablePermissions();
        return view('admin.users.edit', compact('user', 'permissions'));
    }

    public function update(Request $request, string $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['permissions'] = $request->input('permissions', []);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('users', 'public');
            $validated['profile_photo'] = $path;
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Get available permissions list
     */
    public static function getAvailablePermissions()
    {
        return [
            'admin' => 'Administrateur (tous les droits)',
            'edit_partners' => 'Gérer les partenaires',
            'edit_projects' => 'Gérer les projets',
            'edit_team' => 'Gérer l\'équipe',
            'edit_odoo_modules' => 'Gérer les modules Odoo',
            'edit_realizations' => 'Gérer les réalisations',
            'edit_settings' => 'Gérer les paramètres',
            'edit_contact_info' => 'Gérer les coordonnées',
            'edit_blog' => 'Gérer le blog',
            'edit_users' => 'Gérer les utilisateurs',
        ];
    }
}
