@extends('layouts.app')

@section('title', $project->title . ' - Réalisations Zygnixis')

@section('content')
    <article>
        <!-- Project Hero -->
        <div class="relative bg-gray-900 h-96">
            @if($project->featured_image)
                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover opacity-50">
            @else
                <div class="w-full h-full bg-gray-800 opacity-50"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
            <div class="absolute inset-0 flex items-end">
                <div class="container-custom pb-12">
                    <a href="{{ route('projects') }}" class="text-gray-300 hover:text-white mb-4 inline-flex items-center text-sm font-semibold transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Retour aux réalisations
                    </a>
                    <div class="flex items-center gap-4 mb-4">
                        <span class="bg-secondary-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">{{ $project->sector }}</span>
                        <span class="text-gray-300 text-sm date flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $project->published_at ? $project->published_at->format('M Y') : 'Récent' }}
                        </span>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-2">{{ $project->title }}</h1>
                    @if($project->client_name)
                        <p class="text-xl text-gray-300">Client : {{ $project->client_name }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="py-20 bg-white">
            <div class="container-custom">
                <div class="grid lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2 prose prose-lg prose-indigo max-w-none">
                        
                        <h3>Le Contexte</h3>
                        <p>{{ $project->description }}</p>

                        @if($project->solution)
                            <h3>La Solution Apportée</h3>
                            <p>{{ $project->solution }}</p>
                        @endif

                        @if($project->results)
                            <h3>Les Résultats</h3>
                            <p>{{ $project->results }}</p>
                        @endif

                    </div>
                    <div class="lg:col-span-1 space-y-8">
                        @if($project->testimonial)
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 italic relative">
                                <svg class="w-10 h-10 text-gray-200 absolute top-4 left-4 -z-0" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.0547 15.592 14.4793 17.5373 14.4793H19.9826C19.9826 14.4793 19.9826 13.9774 19.9826 13.726C19.9826 12.0197 18.2323 11.232 16.6432 11.232C15.9328 11.232 15.1585 11.4363 14.717 11.7588L13.8816 9.60877C14.7351 8.94829 16.2996 8.32289 17.8443 8.32289C20.9169 8.32289 22.9555 10.3392 22.9555 13.9782V21H14.017ZM8.00253 21L8.00253 18C8.00253 16.0547 9.57749 14.4793 11.5228 14.4793H13.968C13.968 14.4793 13.968 13.9774 13.968 13.726C13.968 12.0197 12.2178 11.232 10.6286 11.232C9.91823 11.232 9.14391 11.4363 8.70243 11.7588L7.86703 9.60877C8.72051 8.94829 10.285 8.32289 11.8297 8.32289C14.9023 8.32289 16.9409 10.3392 16.9409 13.9782V21H8.00253Z" /></svg>
                                <p class="text-gray-600 relative z-10">"{{ $project->testimonial }}"</p>
                            </div>
                        @endif

                        <div class="bg-primary-900 text-white p-6 rounded-xl">
                            <h4 class="font-bold text-lg mb-4">Besoin d'une solution similaire ?</h4>
                            <p class="text-gray-300 text-sm mb-6">Nos experts sont prêts à étudier votre projet.</p>
                            <a href="{{ route('contact') }}" class="block w-full text-center bg-white text-primary-900 font-bold py-2 rounded shadow hover:bg-gray-100 transition-colors">Contacter nous</a>
                        </div>
                    </div>
                </div>

                @if(!empty($project->images) && count($project->images) > 0)
                    <div class="mt-16">
                        <h2 class="text-2xl font-bold font-display text-gray-900 mb-8">Galerie</h2>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($project->images as $image)
                                <div class="rounded-lg overflow-hidden shadow-sm h-64 bg-gray-100">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Project image" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
@endsection
