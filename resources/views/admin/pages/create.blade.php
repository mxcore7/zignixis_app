@extends('layouts.admin')

@section('title', 'Nouvelle Page')

@section('content')
<div class="lg:flex lg:items-center lg:justify-between mb-8">
    <div class="min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Nouvelle Page</h2>
    </div>
</div>

<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('admin.pages.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Main Content -->
                <div class="sm:col-span-4 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titre de la page</label>
                        <div class="mt-2">
                             <x-translatable-input name="title" id="title" :value="old('title')" required />
                        </div>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug (URL)</label>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <p class="mt-1 text-sm text-gray-500">L'URL sera : {{ url('/') }}/[slug]</p>
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Contenu</label>
                        <div class="mt-2">
                             <x-translatable-textarea name="content" id="content" rows="15" :wysiwyg="true">{{ old('content') }}</x-translatable-textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar / SEO -->
                <div class="sm:col-span-2 space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900">Publication</h3>
                        <div class="mt-4 flex items-center">
                            <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">Publier la page</label>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900 mb-4">SEO (Référencement)</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium leading-6 text-gray-700">Méta Titre</label>
                                <div class="mt-1">
                                    <x-translatable-input name="meta_title" id="meta_title" :value="old('meta_title')" />
                                </div>
                            </div>
                            
                            <div>
                                <label for="meta_description" class="block text-sm font-medium leading-6 text-gray-700">Méta Description</label>
                                <div class="mt-1">
                                    <x-translatable-textarea name="meta_description" id="meta_description" rows="3">{{ old('meta_description') }}</x-translatable-textarea>
                                </div>
                            </div>

                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium leading-6 text-gray-700">Mots-clés</label>
                                <div class="mt-1">
                                    <x-translatable-textarea name="meta_keywords" id="meta_keywords" rows="2">{{ old('meta_keywords') }}</x-translatable-textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.pages.index') }}" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Annuler</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
