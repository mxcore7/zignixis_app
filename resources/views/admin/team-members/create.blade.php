@extends('layouts.admin')

@section('title', 'Nouveau Membre de l\'Équipe')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Nouveau Membre de l'Équipe</h2>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom complet *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Photo -->
                        <div>
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo *</label>
                            <input type="file" name="photo" id="photo" accept="image/*" required
                                class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                            @error('photo')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role FR -->
                        <div>
                            <label for="role_fr" class="block text-sm font-medium leading-6 text-gray-900">Rôle (FR) *</label>
                            <input type="text" name="role_fr" id="role_fr" value="{{ old('role_fr') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Directeur Général">
                            @error('role_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role EN -->
                        <div>
                            <label for="role_en" class="block text-sm font-medium leading-6 text-gray-900">Rôle (EN) *</label>
                            <input type="text" name="role_en" id="role_en" value="{{ old('role_en') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="CEO">
                            @error('role_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bio FR -->
                        <div>
                            <label for="bio_fr" class="block text-sm font-medium leading-6 text-gray-900">Biographie (FR)</label>
                            <textarea name="bio_fr" id="bio_fr" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('bio_fr') }}</textarea>
                            @error('bio_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bio EN -->
                        <div>
                            <label for="bio_en" class="block text-sm font-medium leading-6 text-gray-900">Biographie (EN)</label>
                            <textarea name="bio_en" id="bio_en" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('bio_en') }}</textarea>
                            @error('bio_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Social Links -->
                        <div class="border-t pt-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Liens Sociaux</h3>
                            
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="linkedin" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin') }}"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                        placeholder="https://linkedin.com/in/...">
                                </div>
                                <div>
                                    <label for="twitter" class="block text-sm font-medium leading-6 text-gray-900">Twitter</label>
                                    <input type="url" name="twitter" id="twitter" value="{{ old('twitter') }}"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                        placeholder="https://twitter.com/...">
                                </div>
                                <div>
                                    <label for="facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" value="{{ old('facebook') }}"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                        placeholder="https://facebook.com/...">
                                </div>
                            </div>
                        </div>

                        <!-- Order -->
                        <div>
                            <label for="order" class="block text-sm font-medium leading-6 text-gray-900">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('order')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <a href="{{ route('admin.team-members.index') }}" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mr-3">
                        Annuler
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Créer
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
