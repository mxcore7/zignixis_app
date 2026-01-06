@extends('layouts.admin')

@section('title', 'Ajouter un Article')

@section('content')
    <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold leading-6 text-gray-900">Ajouter un nouvel article</h1>
            <p class="mt-2 text-sm text-gray-700">Rédigez votre nouvel article de blog.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.posts.index') }}" class="block rounded-md bg-white px-3 py-2 text-center text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Retour</a>
        </div>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                
                <x-translatable-input name="title" label="Titre" :required="true" />

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Slug</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('slug') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Catégorie</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="category_id" name="category_id" class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <x-translatable-textarea name="excerpt" label="Extrait" />

                <x-translatable-textarea name="content" label="Contenu" :rows="10" :required="true" wysiwyg />

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image à la une</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="file" name="featured_image" id="featured_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @error('featured_image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Date de publication</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', now()->format('Y-m-d')) }}" class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('published_at') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                 <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Meta Title (SEO)</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                
                 <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Meta Description (SEO)</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                         <textarea id="meta_description" name="meta_description" rows="2" class="max-w-lg shadow-sm block w-full focus:ring-primary-500 focus:border-primary-500 sm:text-sm border border-gray-300 rounded-md">{{ old('meta_description') }}</textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('admin.posts.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Annuler</a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Enregistrer</button>
            </div>
        </div>
    </form>
@endsection
