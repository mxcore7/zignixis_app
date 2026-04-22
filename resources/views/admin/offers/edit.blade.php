@extends('layouts.admin')

@section('title', 'Modifier l\'offre')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Modifier l'offre : {{ $offer->name }}</h2>
        </div>
    </div>

    <div class="mt-8" x-data="{
        features: {{ json_encode($offer->features ?? ['']) }},
        addFeature() { this.features.push(''); },
        removeFeature(index) { this.features.splice(index, 1); }
    }">
        <form action="{{ route('admin.offers.update', $offer) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom de l'offre *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $offer->name) }}" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Ex: Odoo Starter">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Subtitle -->
                        <div>
                            <label for="subtitle" class="block text-sm font-medium leading-6 text-gray-900">Sous-titre</label>
                            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $offer->subtitle) }}"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                placeholder="Ex: 30 utilisateurs recommandés">
                            @error('subtitle')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price, Currency, Billing Period -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Prix *</label>
                                <input type="number" name="price" id="price" value="{{ old('price', $offer->price) }}" required min="0"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                @error('price')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="currency" class="block text-sm font-medium leading-6 text-gray-900">Devise *</label>
                                <input type="text" name="currency" id="currency" value="{{ old('currency', $offer->currency) }}" required
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                @error('currency')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="billing_period" class="block text-sm font-medium leading-6 text-gray-900">Période *</label>
                                <input type="text" name="billing_period" id="billing_period" value="{{ old('billing_period', $offer->billing_period) }}" required
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                    placeholder="par mois">
                                @error('billing_period')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Features -->
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Caractéristiques</label>
                            <div class="space-y-2">
                                <template x-for="(feature, index) in features" :key="index">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'features[' + index + ']'" x-model="features[index]"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                            placeholder="Ex: 3 vCPU">
                                        <button type="button" @click="removeFeature(index)" x-show="features.length > 1"
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-sm font-medium text-red-700 ring-1 ring-inset ring-red-600/10 hover:bg-red-100">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="addFeature()"
                                class="mt-3 inline-flex items-center rounded-md bg-gray-50 px-3 py-1.5 text-sm font-medium text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-100">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                Ajouter une caractéristique
                            </button>
                        </div>

                        <!-- Button Text & URL -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="button_text" class="block text-sm font-medium leading-6 text-gray-900">Texte du bouton *</label>
                                <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $offer->button_text) }}" required
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                @error('button_text')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="button_url" class="block text-sm font-medium leading-6 text-gray-900">URL du bouton</label>
                                <input type="url" name="button_url" id="button_url" value="{{ old('button_url', $offer->button_url) }}"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                    placeholder="https://...">
                                @error('button_url')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Color & Order -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Couleur du prix *</label>
                                <select name="color" id="color"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                    <option value="primary" {{ old('color', $offer->color) == 'primary' ? 'selected' : '' }}>🔵 Primary (Bleu)</option>
                                    <option value="secondary" {{ old('color', $offer->color) == 'secondary' ? 'selected' : '' }}>🟢 Secondary (Vert/Teal)</option>
                                    <option value="accent" {{ old('color', $offer->color) == 'accent' ? 'selected' : '' }}>🟣 Accent (Indigo)</option>
                                    <option value="orange" {{ old('color', $offer->color) == 'orange' ? 'selected' : '' }}>🟠 Orange</option>
                                    <option value="purple" {{ old('color', $offer->color) == 'purple' ? 'selected' : '' }}>🟣 Purple</option>
                                </select>
                                @error('color')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="order" class="block text-sm font-medium leading-6 text-gray-900">Ordre d'affichage</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $offer->order) }}"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                @error('order')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Checkboxes -->
                        <div class="flex gap-8">
                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input id="is_active" name="is_active" type="checkbox" value="1" {{ $offer->is_active ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="is_active" class="font-medium text-gray-900">Actif</label>
                                    <p class="text-gray-500">L'offre sera visible sur le site</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input id="is_featured" name="is_featured" type="checkbox" value="1" {{ $offer->is_featured ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="is_featured" class="font-medium text-gray-900">Vedette</label>
                                    <p class="text-gray-500">Mettre en avant cette offre</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <a href="{{ route('admin.offers.index') }}" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mr-3">
                        Annuler
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Mettre à jour
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
