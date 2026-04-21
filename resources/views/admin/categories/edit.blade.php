@extends('layouts.admin')

@section('title', 'Modifier la Catégorie')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Modifier Catégorie</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <a href="{{ route('admin.post-categories.index') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Retour
            </a>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.post-categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-y sm:border-gray-200 sm:py-5">
                                <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nom *</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">FR</span>
                                        <input type="text" name="name[fr]" value="{{ old('name.fr', $category->getTranslation('name', 'fr', false)) }}" required class="flex-1 min-w-0 block w-full px-3 py-2 border border-gray-300 rounded-none rounded-r-md focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    </div>
                                    @error('name.fr') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    
                                    <div class="flex rounded-md shadow-sm mt-3">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">EN</span>
                                        <input type="text" name="name[en]" value="{{ old('name.en', $category->getTranslation('name', 'en', false)) }}" class="flex-1 min-w-0 block w-full px-3 py-2 border border-gray-300 rounded-none rounded-r-md focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    </div>
                                    @error('name.en') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-b sm:border-gray-200 sm:pb-5">
                                <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Slug</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('slug') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-b sm:border-gray-200 sm:pb-5">
                                <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="flex rounded-md shadow-sm">
                                        <span class="inline-flex flex-col justify-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">FR</span>
                                        <textarea name="description[fr]" rows="3" class="flex-1 min-w-0 block w-full px-3 py-2 border border-gray-300 rounded-none rounded-r-md focus:ring-primary-500 focus:border-primary-500 sm:text-sm">{{ old('description.fr', $category->getTranslation('description', 'fr', false)) }}</textarea>
                                    </div>
                                    @error('description.fr') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    
                                    <div class="flex rounded-md shadow-sm mt-3">
                                        <span class="inline-flex flex-col justify-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">EN</span>
                                        <textarea name="description[en]" rows="3" class="flex-1 min-w-0 block w-full px-3 py-2 border border-gray-300 rounded-none rounded-r-md focus:ring-primary-500 focus:border-primary-500 sm:text-sm">{{ old('description.en', $category->getTranslation('description', 'en', false)) }}</textarea>
                                    </div>
                                    @error('description.en') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Sauvegarder
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
