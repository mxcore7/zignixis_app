@extends('layouts.admin')

@section('title', 'Nouveau Module Odoo')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Nouveau Module Odoo</h2>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.odoo-modules.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Name FR -->
                        <div>
                            <label for="name_fr" class="block text-sm font-medium leading-6 text-gray-900">Nom (FR) *</label>
                            <input type="text" name="name_fr" id="name_fr" value="{{ old('name_fr') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('name_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name EN -->
                        <div>
                            <label for="name_en" class="block text-sm font-medium leading-6 text-gray-900">Nom (EN) *</label>
                            <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            @error('name_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Icon -->
                        <div>
                            <label for="icon" class="block text-sm font-medium leading-6 text-gray-900">Icône *</label>
                            <input type="text" name="icon" id="icon" value="{{ old('icon') }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="users, shopping-cart, calculator, etc.">
                            <p class="mt-1 text-sm text-gray-500">Nom de l'icône (ex: users, calculator, cog)</p>
                            @error('icon')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description FR -->
                        <div>
                            <label for="description_fr" class="block text-sm font-medium leading-6 text-gray-900">Description (FR) *</label>
                            <textarea name="description_fr" id="description_fr" rows="3" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_fr') }}</textarea>
                            @error('description_fr')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description EN -->
                        <div>
                            <label for="description_en" class="block text-sm font-medium leading-6 text-gray-900">Description (EN) *</label>
                            <textarea name="description_en" id="description_en" rows="3" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description_en') }}</textarea>
                            @error('description_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Link -->
                        <div>
                            <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Lien</label>
                            <input type="url" name="link" id="link" value="{{ old('link') }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="https://odoo.com/app/crm">
                            @error('link')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                    <a href="{{ route('admin.odoo-modules.index') }}" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mr-3">
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
