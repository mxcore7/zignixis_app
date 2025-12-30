@extends('layouts.app')

@section('title', 'Accueil - Transformation Digitale & Odoo')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-900 to-primary-700 opacity-90"></div>
        <div class="absolute inset-0 bg-[url('/images/circuit-board-pattern.png')] opacity-20"></div>
        
        <div class="container-custom relative z-10 py-24 lg:py-32">
            <div class="max-w-2xl animate-fade-in-up">
                <h1 class="text-4xl lg:text-6xl font-display font-bold mb-6 leading-tight">
                    Accélérez votre <span class="text-secondary-500">Transformation Digitale</span> avec l'ERP Odoo
                </h1>
                <p class="text-lg lg:text-xl text-gray-200 mb-10 leading-relaxed">
                    Zygnixis vous accompagne dans l'optimisation de vos processus métier, la sécurisation de vos infrastructures et le déploiement de solutions technologiques sur mesure.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="btn-secondary text-center">Demander une démo</a>
                    <a href="{{ route('solutions') }}" class="btn-outline border-white text-white hover:bg-white hover:text-primary-900 text-center">
                        Découvrir nos solutions
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Animated Background Elements (Optional) -->
        <div class="absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-1/3 w-1/2 h-full opacity-30 pointer-events-none hidden lg:block">
            <!-- Placeholder for 3D or SVG illustration -->
        </div>
    </section>

    <!-- Partners / Trust Badge Section -->
    <section class="py-12 bg-white border-b border-gray-100">
        <div class="container-custom">
            <p class="text-center text-sm font-semibold text-gray-500 uppercase tracking-wide mb-8">Ils nous font confiance</p>
            <div class="flex flex-wrap justify-center gap-8 lg:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                @forelse($partners as $partner)
                    <div class="h-12 w-32 flex items-center justify-center">
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full max-w-full object-contain">
                        @else
                            <span class="font-bold text-gray-400">{{ $partner->name }}</span>
                        @endif
                    </div>
                @empty
                    <div class="h-12 w-32 bg-gray-200 rounded flex items-center justify-center font-bold text-gray-400">PARTNER 1</div>
                    <div class="h-12 w-32 bg-gray-200 rounded flex items-center justify-center font-bold text-gray-400">PARTNER 2</div>
                    <div class="h-12 w-32 bg-gray-200 rounded flex items-center justify-center font-bold text-gray-400">PARTNER 3</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-gray-50">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-display font-bold text-primary-900 mb-4">Nos Domaines d'Expertise</h2>
                <p class="text-gray-600">Nous combinons expertise technique et compréhension métier pour propulser votre entreprise vers l'excellence opérationnelle.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1: Odoo -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-primary-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Intégration ERP Odoo</h3>
                    <p class="text-gray-600 mb-4">Comptabilité, RH, Ventes, Stocks. Une suite d'applications intégrées pour gérer toute votre entreprise.</p>
                    <a href="{{ route('solutions') }}" class="text-primary-600 font-semibold hover:text-primary-700 flex items-center">En savoir plus <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>

                <!-- Service 2: Security -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-secondary-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-secondary-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-secondary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sécurité Électronique</h3>
                    <p class="text-gray-600 mb-4">Vidéosurveillance (CCTV), Contrôle d'accès, Systèmes d'alarme. Protégez vos actifs avec les dernières technologies.</p>
                    <a href="{{ route('solutions') }}" class="text-secondary-600 font-semibold hover:text-secondary-700 flex items-center">En savoir plus <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>

                <!-- Service 3: Dev -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-accent-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-accent-500 transition-colors duration-300">
                        <svg class="w-8 h-8 text-accent-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Développement Sur Mesure</h3>
                    <p class="text-gray-600 mb-4">Applications Web & Mobile, Sites Corporate, E-commerce. Des solutions digitales performantes et évolutives.</p>
                    <a href="{{ route('solutions') }}" class="text-accent-600 font-semibold hover:text-accent-700 flex items-center">En savoir plus <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Odoo Section -->
    <section class="py-20 bg-white">
        <div class="container-custom">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-10 lg:mb-0">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <!-- Placeholder for Dashboard Image -->
                        <div class="aspect-w-16 aspect-h-10 bg-gray-800 flex items-center justify-center text-white">
                            <span class="text-2xl font-bold text-gray-500">Odoo Dashboard Screenshot</span>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="text-secondary-600 font-bold tracking-wider uppercase text-sm mb-2 block">Pourquoi choisir Odoo ?</span>
                    <h2 class="text-3xl lg:text-4xl font-display font-bold text-primary-900 mb-6">La solution tout-en-un pour gérer votre entreprise</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Fini les logiciels dispersés et les données en silos. Odoo centralise toutes vos opérations dans une interface unique, moderne et facile à utiliser.
                    </p>
                    
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-gray-900">Modulaire et Évolutif</h4>
                                <p class="text-gray-600 text-sm">Commencez petit avec quelques applications et ajoutez-en d'autres au fur et à mesure de votre croissance.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-gray-900">Interface Intuitive</h4>
                                <p class="text-gray-600 text-sm">Une expérience utilisateur moderne qui réduit drastiquement le temps de formation de vos employés.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-gray-900">Coût Optimisé</h4>
                                <p class="text-gray-600 text-sm">Un excellent rapport qualité/prix comparé aux ERP traditionnels comme SAP ou Oracle.</p>
                            </div>
                        </li>
                    </ul>

                    <a href="{{ route('contact') }}" class="btn-primary">Demander une démo personnalisée</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects -->
    @if($featuredProjects->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="container-custom">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-display font-bold text-primary-900 mb-2">Nos Récentes Réalisations</h2>
                    <p class="text-gray-600">Découvrez comment nous aidons nos clients à réussir.</p>
                </div>
                <a href="{{ route('projects') }}" class="hidden md:flex text-primary-600 font-semibold hover:text-primary-800 items-center">
                    Voir tout <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="h-48 bg-gray-200 relative">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-primary-900 shadow-sm">
                                {{ $project->sector ?? 'Technologie' }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-secondary-600 font-semibold text-sm hover:text-secondary-700">Voir les détails &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('projects') }}" class="btn-outline">Voir tous nos projets</a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-20 bg-primary-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-blue-900 opacity-50 mix-blend-multiply"></div>
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-secondary-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-accent-500 rounded-full blur-3xl opacity-20"></div>
        
        <div class="container-custom relative z-10 text-center max-w-4xl mx-auto">
            <h2 class="text-3xl lg:text-5xl font-display font-bold mb-6">Prêt à transformer votre entreprise ?</h2>
            <p class="text-xl text-gray-200 mb-10">
                Nos experts sont prêts à auditer vos besoins et vous proposer la solution idéale. La première consultation est gratuite.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="bg-white text-primary-900 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors shadow-lg text-lg">
                    Parler à un expert
                </a>
                <a href="tel:+237699999999" class="border-2 border-white/30 px-8 py-3 rounded-lg font-bold text-white hover:bg-white/10 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    (+237) 6XX XX XX XX
                </a>
            </div>
        </div>
    </section>
@endsection
