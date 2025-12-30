@extends('layouts.app')

@section('title', 'Nos Réalisations - Zygnixis')

@section('content')
    <!-- Hero -->
    <section class="bg-primary-900 py-20 text-white">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold mb-6">Nos Réalisations</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Découvrez comment nous transformons les défis de nos clients en succès digitaux.
            </p>
        </div>
    </section>

    <!-- Realizations Grid -->
    <section class="py-20 bg-white">
        <div class="container-custom">
            @if($realizations->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($realizations as $realization)
                        <div class="group bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                            <div class="h-64 overflow-hidden relative">
                                @if($realization->image)
                                    <img src="{{ asset('storage/' . $realization->image) }}" alt="{{ $realization->getTranslation('title', 'fr') }}" 
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-600 transition-colors">
                                    {{ $realization->getTranslation('title', 'fr') }}
                                </h3>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ $realization->getTranslation('description', 'fr') }}
                                </p>
                                <div class="flex items-center text-primary-600 font-semibold group/link cursor-pointer">
                                    Voir les détails
                                    <svg class="w-5 h-5 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Aucune réalisation pour le moment</h3>
                    <p class="mt-2 text-gray-500">Revenez bientôt pour découvrir nos derniers projets.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gray-50 py-20">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-display font-bold text-gray-900 mb-6">Vous avez un projet similaire ?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                Discutons de vos besoins et voyons comment nous pouvons vous aider à atteindre vos objectifs.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-primary-600 rounded-xl hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                Démarrer un projet
            </a>
        </div>
    </section>
@endsection
