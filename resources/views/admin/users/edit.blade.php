@extends('layouts.admin')

@section('title', 'Modifier un Utilisateur')

@section('content')
    <div class="sm:flex sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold leading-6 text-gray-900">Modifier l'utilisateur</h1>
            <p class="mt-2 text-sm text-gray-700">Mettez à jour les informations de {{ $user->name }}.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.users.index') }}" class="block rounded-md bg-white px-3 py-2 text-center text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Retour</a>
        </div>
    </div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
        @csrf
        @method('PUT')
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nom Complet</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Adresse Email</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Nouveau Mot de passe</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="password" name="password" id="password" class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        <p class="mt-2 text-sm text-gray-500">Laisser vide pour ne pas changer.</p>
                        @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Confirmer le nouveau mot de passe</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="max-w-lg block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <!-- Profile Photo -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="profile_photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Photo de profil</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        @if($user->profile_photo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo actuelle" class="h-20 w-20 rounded-full object-cover">
                                <p class="text-sm text-gray-500 mt-1">Photo actuelle</p>
                            </div>
                        @endif
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="max-w-lg block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                        <p class="mt-2 text-sm text-gray-500">JPG, PNG ou GIF (max. 2MB). Laisser vide pour ne pas changer.</p>
                        @error('profile_photo') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Is Active -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="is_active" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Compte Actif</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="is_active" name="is_active" type="checkbox" {{ old('is_active', $user->is_active) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="is_active" class="font-medium text-gray-900">Activer l'utilisateur</label>
                                <p class="text-gray-500">Un utilisateur inactif ne pourra pas se connecter.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permissions -->
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Permissions</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @foreach($permissions as $key => $label)
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="perm_{{ $key }}" name="permissions[]" type="checkbox" value="{{ $key }}"
                                            {{ in_array($key, old('permissions', $user->permissions ?? [])) ? 'checked' : '' }}
                                            class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="perm_{{ $key }}" class="font-medium text-gray-900">{{ $label }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('permissions') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('admin.users.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Annuler</a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Mettre à jour</button>
            </div>
        </div>
    </form>
@endsection
