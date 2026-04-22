@extends('layouts.app')

@section('title', 'Demande de Devis')
@section('meta_description', 'Obtenez une estimation de prix pour votre projet logiciel ou web en quelques minutes. Décrivez vos besoins et nous revenons vers vous.')

@section('content')
<main>
    <!-- Background Design -->
    <div class="relative bg-gray-900 py-24 sm:py-32 overflow-hidden">
        <div class="absolute inset-y-0 right-1/2 -z-10 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white ring-1 ring-primary-50 shadow-xl shadow-primary-600/10 sm:w-[150%]" aria-hidden="true"></div>
        <div class="container-custom relative z-10">
            <div class="max-w-2xl mx-auto text-center mb-16">
                <span class="inline-flex items-center rounded-full bg-primary-900/50 px-3 py-1 text-sm font-semibold text-primary-200 ring-1 ring-inset ring-primary-500/20 mb-6">
                    {{ __('Mise en relation rapide') }}
                </span>
                <h1 class="text-4xl font-display font-bold text-white sm:text-6xl mb-6 tracking-tight">{{ __('Estimez votre') }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">{{ __('Projet') }}</span></h1>
                <p class="text-lg leading-8 text-gray-300">
                    {{ __('Complétez ce formulaire interactif pour nous aider à comprendre votre besoin. Nous vous ferons une proposition technique et financière adaptée sous 48h.') }}
                </p>
            </div>

            <!-- Validation Errors Fallback Global -->
            @if ($errors->any())
                <div class="max-w-2xl mx-auto rounded-md bg-red-50 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Il y a des erreurs dans votre formulaire. Veuillez vérifier vos saisies aux étapes précédentes.</h3>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Livewire Wizard Component -->
            <div class="max-w-3xl mx-auto">
                <livewire:quote-wizard />
            </div>
        </div>
    </div>
</main>
@endsection
