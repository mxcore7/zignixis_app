<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('order')->get();
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'role_fr' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $socialLinks = [];
        if ($request->linkedin) $socialLinks['linkedin'] = $request->linkedin;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;

        TeamMember::create([
            'name' => $validated['name'],
            'photo' => $validated['photo'],
            'role' => [
                'fr' => $validated['role_fr'],
                'en' => $validated['role_en'],
            ],
            'bio' => [
                'fr' => $validated['bio_fr'] ?? '',
                'en' => $validated['bio_en'] ?? '',
            ],
            'social_links' => $socialLinks,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Membre de l\'équipe créé avec succès.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'role_fr' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $socialLinks = [];
        if ($request->linkedin) $socialLinks['linkedin'] = $request->linkedin;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;

        $updateData = [
            'name' => $validated['name'],
            'role' => [
                'fr' => $validated['role_fr'],
                'en' => $validated['role_en'],
            ],
            'bio' => [
                'fr' => $validated['bio_fr'] ?? '',
                'en' => $validated['bio_en'] ?? '',
            ],
            'social_links' => $socialLinks,
            'order' => $validated['order'] ?? 0,
        ];

        if (isset($validated['photo'])) {
            $updateData['photo'] = $validated['photo'];
        }

        $teamMember->update($updateData);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Membre de l\'équipe mis à jour avec succès.');
    }

    public function destroy(TeamMember $teamMember)
    {
        // Delete photo
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Membre de l\'équipe supprimé avec succès.');
    }
}
