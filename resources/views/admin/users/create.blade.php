@extends('layouts.admin')

@section('title', 'Ajouter un Utilisateur')

@section('content')
    <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold leading-6 text-gray-900">Ajouter un nouvel utilisateur</h1>
            <p class="mt-2 text-sm text-gray-700">Créez un nouvel accès administrateur.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.users.index') }}" class="block rounded-md bg-white px-3 py-2 text-center text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Retour</a>
        </div>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nom Complet</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Adresse Email</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Mot de passe</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="password" name="password" id="password" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Confirmer le mot de passe</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('admin.users.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Annuler</a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Enregistrer</button>
            </div>
        </div>
    </form>
@endsection
