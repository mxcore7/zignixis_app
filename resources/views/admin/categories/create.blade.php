@extends('layouts.admin')

@section('title', 'Ajouter une Catégorie')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Nouvelle Catégorie</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <a href="{{ route('admin.post-categories.index') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Retour
            </a>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.post-categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            
                            <x-translatable-input name="name" label="Nom" :required="true" />

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Slug</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('slug') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <x-translatable-textarea name="description" label="Description" />
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Créer
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
