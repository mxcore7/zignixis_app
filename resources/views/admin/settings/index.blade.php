@extends('layouts.admin')

@section('title', 'Paramètres du Site')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Paramètres du Site</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-6">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="space-y-6">
        <!-- Logo and Favicon -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Logo et Favicon</h3>
                <form action="{{ route('admin.settings.logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="site_logo" class="block text-sm font-medium leading-6 text-gray-900">Logo du site</label>
                            @if($settings->where('key', 'site_logo')->first()?->value)
                                <img src="{{ asset('storage/' . $settings->where('key', 'site_logo')->first()->value) }}" alt="Logo" class="mt-2 h-16 mb-2">
                            @endif
                            <input type="file" name="site_logo" id="site_logo" accept="image/*"
                                class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                        </div>
                        <div>
                            <label for="site_favicon" class="block text-sm font-medium leading-6 text-gray-900">Favicon</label>
                            @if($settings->where('key', 'site_favicon')->first()?->value)
                                <img src="{{ asset('storage/' . $settings->where('key', 'site_favicon')->first()->value) }}" alt="Favicon" class="mt-2 h-8 mb-2">
                            @endif
                            <input type="file" name="site_favicon" id="site_favicon" accept="image/*"
                                class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Social Links -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Liens Sociaux</h3>
                <form action="{{ route('admin.settings.social') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="social_facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                            <input type="url" name="social_facebook" id="social_facebook" 
                                value="{{ old('social_facebook', $settings->where('key', 'social_facebook')->first()?->value) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="https://facebook.com/votreentreprise">
                        </div>
                        <div>
                            <label for="social_linkedin" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn</label>
                            <input type="url" name="social_linkedin" id="social_linkedin" 
                                value="{{ old('social_linkedin', $settings->where('key', 'social_linkedin')->first()?->value) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="https://linkedin.com/company/votreentreprise">
                        </div>
                        <div>
                            <label for="social_twitter" class="block text-sm font-medium leading-6 text-gray-900">Twitter</label>
                            <input type="url" name="social_twitter" id="social_twitter" 
                                value="{{ old('social_twitter', $settings->where('key', 'social_twitter')->first()?->value) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="https://twitter.com/votreentreprise">
                        </div>
                        <div>
                            <label for="social_instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                            <input type="url" name="social_instagram" id="social_instagram" 
                                value="{{ old('social_instagram', $settings->where('key', 'social_instagram')->first()?->value) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="https://instagram.com/votreentreprise">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- General Settings -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Paramètres Généraux</h3>
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="site_name" class="block text-sm font-medium leading-6 text-gray-900">Nom du site</label>
                            <input type="text" name="site_name" id="site_name" 
                                value="{{ old('site_name', $settings->where('key', 'site_name')->first()?->value) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                        </div>
                        
                        <!-- Footer Description FR -->
                        <div>
                            <label for="footer_description_fr" class="block text-sm font-medium leading-6 text-gray-900">Description Footer (FR)</label>
                            <textarea name="footer_description_fr" id="footer_description_fr" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('footer_description_fr', $settings->where('key', 'footer_description')->first()?->value['fr'] ?? '') }}</textarea>
                        </div>
                        
                        <!-- Footer Description EN -->
                        <div>
                            <label for="footer_description_en" class="block text-sm font-medium leading-6 text-gray-900">Description Footer (EN)</label>
                            <textarea name="footer_description_en" id="footer_description_en" rows="3"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('footer_description_en', $settings->where('key', 'footer_description')->first()?->value['en'] ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
