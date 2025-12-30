@extends('layouts.app')

@section('title', 'À Propos de Nous - Zygnixis')

@section('content')
    <!-- Hero -->
    <section class="bg-primary-900 py-20 text-white">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold mb-6">Notre Histoire & Vision</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Depuis plus de 10 ans, Zygnixis accompagne les entreprises africaines dans leur transformation digitale avec rigueur et innovation.
            </p>
        </div>
    </section>

    <!-- Values -->
    <section class="py-20 bg-white">
        <div class="container-custom">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-display font-bold text-gray-900">Nos Valeurs</h2>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Innovation -->
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Innovation</h3>
                    <p class="text-gray-600 text-sm">Toujours à la pointe des technologies pour offrir le meilleur.</p>
                </div>
                <!-- Excellence -->
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Excellence</h3>
                    <p class="text-gray-600 text-sm">La qualité est au cœur de chacun de nos livrables.</p>
                </div>
                <!-- Résultats -->
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Résultats</h3>
                    <p class="text-gray-600 text-sm">Nous nous engageons sur des résultats concrets et mesurables.</p>
                </div>
                <!-- Adaptation -->
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Adaptation</h3>
                    <p class="text-gray-600 text-sm">Des solutions sur mesure adaptées à votre contexte spécifique.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="py-20 bg-gray-50">
        <div class="container-custom">
            <h2 class="text-3xl font-display font-bold text-gray-900 text-center mb-16">Notre Parcours</h2>
            <div class="max-w-4xl mx-auto space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                
                <!-- Item 1 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-300 group-[.is-active]:bg-primary-500 text-slate-500 group-[.is-active]:text-emerald-50 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="10">
                            <path fill-rule="nonzero" d="M10.422 1.257 4.655 7.025 2.553 4.923A.916.916 0 0 0 1.257 6.22l2.75 2.75a.916.916 0 0 0 1.296 0l6.415-6.416a.916.916 0 0 0-1.296-1.296Z" />
                        </svg>
                    </div>
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded border border-slate-200 shadow">
                        <div class="flex items-center justify-between space-x-2 mb-1">
                            <div class="font-bold text-slate-900">Fondation de Zygnixis</div>
                            <time class="font-caveat font-medium text-primary-500">2010</time>
                        </div>
                        <div class="text-slate-500 text-sm">Début de l'aventure avec une vision claire : digitaliser l'Afrique.</div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-300 group-[.is-active]:bg-primary-500 text-slate-500 group-[.is-active]:text-emerald-50 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="10">
                            <path fill-rule="nonzero" d="M10.422 1.257 4.655 7.025 2.553 4.923A.916.916 0 0 0 1.257 6.22l2.75 2.75a.916.916 0 0 0 1.296 0l6.415-6.416a.916.916 0 0 0-1.296-1.296Z" />
                        </svg>
                    </div>
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded border border-slate-200 shadow">
                        <div class="flex items-center justify-between space-x-2 mb-1">
                            <div class="font-bold text-slate-900">Partenariat Odoo</div>
                            <time class="font-caveat font-medium text-primary-500">2015</time>
                        </div>
                        <div class="text-slate-500 text-sm">Certification officielle et premiers grands déploiements ERP.</div>
                    </div>
                </div>

                 <!-- Item 3 -->
                 <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-300 group-[.is-active]:bg-primary-500 text-slate-500 group-[.is-active]:text-emerald-50 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="12" height="10">
                            <path fill-rule="nonzero" d="M10.422 1.257 4.655 7.025 2.553 4.923A.916.916 0 0 0 1.257 6.22l2.75 2.75a.916.916 0 0 0 1.296 0l6.415-6.416a.916.916 0 0 0-1.296-1.296Z" />
                        </svg>
                    </div>
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded border border-slate-200 shadow">
                        <div class="flex items-center justify-between space-x-2 mb-1">
                            <div class="font-bold text-slate-900">Expansion Régionale</div>
                            <time class="font-caveat font-medium text-primary-500">2020</time>
                        </div>
                        <div class="text-slate-500 text-sm">Ouverture de bureaux dans la sous-région et diversification des services.</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="py-20 bg-white">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-display font-bold text-gray-900 mb-16">L'Équipe Dirigeante</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($teamMembers as $member)
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm group">
                        <div class="h-64 bg-gray-300 relative overflow-hidden">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900">{{ $member->name }}</h3>
                            <p class="text-primary-600 font-medium mb-4">{{ $member->getTranslation('role', 'fr') }}</p>
                            @if($member->getTranslation('bio', 'fr'))
                                <p class="text-gray-500 text-sm mb-4">{{ Str::limit($member->getTranslation('bio', 'fr'), 100) }}</p>
                            @endif
                            
                            @if($member->social_links)
                                <div class="flex justify-center space-x-4">
                                    @foreach($member->social_links as $platform => $url)
                                        @if($url)
                                            <a href="{{ $url }}" target="_blank" class="text-gray-400 hover:text-primary-600 transition-colors">
                                                <i class="fab fa-{{ $platform }} text-lg"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
