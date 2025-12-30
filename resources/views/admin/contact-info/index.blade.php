@extends('layouts.admin')

@section('title', 'Informations de Contact')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Informations de Contact</h2>
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

    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900 mb-6">Gérer les coordonnées de contact</h3>
            
            <div class="space-y-6">
                @forelse(\App\Models\ContactInfo::ordered()->get() as $info)
                    <div class="border-b border-gray-200 pb-6 last:border-0">
                        <form action="{{ route('admin.contact-info.update', $info) }}" method="POST" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @csrf
                            @method('PUT')
                            
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Clé</label>
                                <p class="mt-1 text-sm text-gray-900 font-mono bg-gray-50 px-3 py-2 rounded">{{ $info->key }}</p>
                            </div>

                            <div>
                                <label for="value_{{ $info->id }}" class="block text-sm font-medium text-gray-700">Valeur</label>
                                @if(is_array($info->value) && isset($info->value['fr']))
                                    <input type="hidden" name="is_translatable" value="1">
                                    <input type="text" name="value_fr" id="value_fr_{{ $info->id }}" value="{{ $info->value['fr'] ?? '' }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                                        placeholder="Français">
                                    <input type="text" name="value_en" id="value_en_{{ $info->id }}" value="{{ $info->value['en'] ?? '' }}"
                                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                                        placeholder="English">
                                @else
                                    <input type="text" name="value_simple" id="value_{{ $info->id }}" value="{{ $info->value }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                @endif
                            </div>

                            <div>
                                <label for="icon_{{ $info->id }}" class="block text-sm font-medium text-gray-700">Icône</label>
                                <input type="text" name="icon" id="icon_{{ $info->id }}" value="{{ $info->icon }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="type_{{ $info->id }}" class="block text-sm font-medium text-gray-700">Type</label>
                                <select name="type" id="type_{{ $info->id }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                    <option value="text" {{ $info->type === 'text' ? 'selected' : '' }}>Texte</option>
                                    <option value="email" {{ $info->type === 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="phone" {{ $info->type === 'phone' ? 'selected' : '' }}>Téléphone</option>
                                    <option value="address" {{ $info->type === 'address' ? 'selected' : '' }}>Adresse</option>
                                </select>
                            </div>

                            <div>
                                <label for="order_{{ $info->id }}" class="block text-sm font-medium text-gray-700">Ordre</label>
                                <input type="number" name="order" id="order_{{ $info->id }}" value="{{ $info->order }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                            </div>

                            <div class="sm:col-span-2 flex justify-between items-center">
                                <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                                    Mettre à jour
                                </button>
                                
                                <button type="button" onclick="if(confirm('Êtes-vous sûr ?')) { document.getElementById('delete-form-{{ $info->id }}').submit(); }"
                                    class="text-red-600 hover:text-red-900 text-sm font-medium">
                                    Supprimer
                                </button>
                            </div>
                        </form>
                        
                        <form id="delete-form-{{ $info->id }}" action="{{ route('admin.contact-info.destroy', $info) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">Aucune information de contact pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
