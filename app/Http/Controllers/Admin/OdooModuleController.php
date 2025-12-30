<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OdooModule;
use Illuminate\Http\Request;

class OdooModuleController extends Controller
{
    public function index()
    {
        $modules = OdooModule::orderBy('order')->get();
        return view('admin.odoo-modules.index', compact('modules'));
    }

    public function create()
    {
        return view('admin.odoo-modules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'link' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        OdooModule::create([
            'name' => [
                'fr' => $validated['name_fr'],
                'en' => $validated['name_en'],
            ],
            'icon' => $validated['icon'],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'features' => $validated['features'] ?? [],
            'link' => $validated['link'] ?? null,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.odoo-modules.index')
            ->with('success', 'Module Odoo créé avec succès.');
    }

    public function edit(OdooModule $odooModule)
    {
        return view('admin.odoo-modules.edit', compact('odooModule'));
    }

    public function update(Request $request, OdooModule $odooModule)
    {
        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'link' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        $odooModule->update([
            'name' => [
                'fr' => $validated['name_fr'],
                'en' => $validated['name_en'],
            ],
            'icon' => $validated['icon'],
            'description' => [
                'fr' => $validated['description_fr'],
                'en' => $validated['description_en'],
            ],
            'features' => $validated['features'] ?? [],
            'link' => $validated['link'] ?? null,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.odoo-modules.index')
            ->with('success', 'Module Odoo mis à jour avec succès.');
    }

    public function destroy(OdooModule $odooModule)
    {
        $odooModule->delete();

        return redirect()->route('admin.odoo-modules.index')
            ->with('success', 'Module Odoo supprimé avec succès.');
    }
}
