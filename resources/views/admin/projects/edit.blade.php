@extends('layouts.admin')

@section('title', 'Modifier le Projet')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Modifier le Projet: {{ $project->title }}</h2>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        
                        <!-- Client & Sector -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="client_name" class="block text-sm font-medium leading-6 text-gray-900">Nom du Client</label>
                                <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <div>
                                <label for="sector" class="block text-sm font-medium leading-6 text-gray-900">Secteur d'activité *</label>
                                <input type="text" name="sector" id="sector" value="{{ old('sector', $project->sector) }}" required
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug (URL) *</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            <p class="mt-1 text-sm text-gray-500">Identifiant unique pour l'URL</p>
                        </div>

                        <!-- Title FR -->
                        <div>
                            <label for="title_fr" class="block text-sm font-medium leading-6 text-gray-900">Titre (FR) *</label>
                            <input type="text" name="title_fr" id="title_fr" value="{{ old('title_fr', $project->getTranslation('title', 'fr')) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                        </div>

                        <!-- Title EN -->
                        <div>
                            <label for="title_en" class="block text-sm font-medium leading-6 text-gray-900">Titre (EN) *</label>
                            <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $project->getTranslation('title', 'en')) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                        </div>

                        <!-- Description FR -->
                        <div>
                            <label for="description_fr" class="block text-sm font-medium leading-6 text-gray-900">Description (FR) *</label>
                            <textarea name="description_fr" id="description_fr" rows="4" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_fr', $project->getTranslation('description', 'fr')) }}</textarea>
                        </div>

                        <!-- Description EN -->
                        <div>
                            <label for="description_en" class="block text-sm font-medium leading-6 text-gray-900">Description (EN) *</label>
                            <textarea name="description_en" id="description_en" rows="4" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_en', $project->getTranslation('description', 'en')) }}</textarea>
                        </div>

                        <!-- Solution FR -->
                        <div>
                            <label for="solution_fr" class="block text-sm font-medium leading-6 text-gray-900">Solution Apportée (FR)</label>
                            <textarea name="solution_fr" id="solution_fr" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('solution_fr', $project->getTranslation('solution', 'fr')) }}</textarea>
                        </div>

                         <!-- Solution EN -->
                        <div>
                            <label for="solution_en" class="block text-sm font-medium leading-6 text-gray-900">Solution Apportée (EN)</label>
                            <textarea name="solution_en" id="solution_en" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('solution_en', $project->getTranslation('solution', 'en')) }}</textarea>
                        </div>

                        <!-- Results FR -->
                        <div>
                            <label for="results_fr" class="block text-sm font-medium leading-6 text-gray-900">Résultats (FR)</label>
                            <textarea name="results_fr" id="results_fr" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('results_fr', $project->getTranslation('results', 'fr')) }}</textarea>
                        </div>

                        <!-- Results EN -->
                        <div>
                            <label for="results_en" class="block text-sm font-medium leading-6 text-gray-900">Résultats (EN)</label>
                            <textarea name="results_en" id="results_en" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('results_en', $project->getTranslation('results', 'en')) }}</textarea>
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image Principale</label>
                            @if($project->image)
                                <div class="mt-2 mb-4">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Image actuelle" class="h-32 w-auto object-cover rounded-lg border border-gray-200">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" accept="image/*"
                                class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <p class="mt-1 text-sm text-gray-500">Laisser vide pour conserver l'image actuelle.</p>
                        </div>

                        <!-- Published At -->
                        <div>
                            <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Date de Publication</label>
                            <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $project->published_at ? $project->published_at->format('Y-m-d') : '') }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <a href="{{ route('admin.projects.index') }}" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mr-3">
                        Annuler
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Mettre à jour
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
