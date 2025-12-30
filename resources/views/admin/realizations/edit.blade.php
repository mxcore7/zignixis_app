@extends('layouts.admin')

@section('title', 'Modifier Réalisation')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Modifier Réalisation</h2>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.realizations.update', $realization) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Title FR -->
                        <div>
                            <label for="title_fr" class="block text-sm font-medium leading-6 text-gray-900">Titre (FR) *</label>
                            <input type="text" name="title_fr" id="title_fr" value="{{ old('title_fr', $realization->getTranslation('title', 'fr')) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('title_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title EN -->
                        <div>
                            <label for="title_en" class="block text-sm font-medium leading-6 text-gray-900">Titre (EN) *</label>
                            <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $realization->getTranslation('title', 'en')) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('title_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description FR -->
                        <div>
                            <label for="description_fr" class="block text-sm font-medium leading-6 text-gray-900">Description (FR) *</label>
                            <textarea name="description_fr" id="description_fr" rows="4" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_fr', $realization->getTranslation('description', 'fr')) }}</textarea>
                            @error('description_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description EN -->
                        <div>
                            <label for="description_en" class="block text-sm font-medium leading-6 text-gray-900">Description (EN) *</label>
                            <textarea name="description_en" id="description_en" rows="4" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_en', $realization->getTranslation('description', 'en')) }}</textarea>
                            @error('description_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Image -->
                        @if($realization->image)
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Image actuelle</label>
                                <img src="{{ asset('storage/' . $realization->image) }}" alt="{{ $realization->getTranslation('title', 'fr') }}" class="mt-2 h-32 rounded object-cover border">
                            </div>
                        @endif

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Nouvelle image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF jusqu'à 2MB. Laissez vide pour garder l'image actuelle.</p>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Order -->
                        <div>
                            <label for="order" class="block text-sm font-medium leading-6 text-gray-900">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" value="{{ old('order', $realization->order) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('order')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Is Active -->
                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="is_active" name="is_active" type="checkbox" {{ old('is_active', $realization->is_active) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="is_active" class="font-medium text-gray-900">Actif</label>
                                <p class="text-gray-500">La réalisation sera visible sur le site</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <a href="{{ route('admin.realizations.index') }}" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mr-3">
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
