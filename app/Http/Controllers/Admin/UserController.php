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
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);

        \App\Models\User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
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
