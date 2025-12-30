@extends('layouts.app')

@section('title', 'Page Non Trouvée - Zygnixis')

@section('content')
    <div class="min-h-[70vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full text-center space-y-8">
            <div>
                <h1 class="text-9xl font-display font-black text-primary-200">404</h1>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Page introuvable</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
                </p>
            </div>
            <div class="mt-8">
                <a href="{{ route('home') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
@endsection
