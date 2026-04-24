@extends('layouts.app')

@section('title', 'Expertise & Méthodologie - Zygnixis')

@section('content')
    <section class="bg-primary-900 py-20 text-white">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold mb-6">{{ __('Notre Méthodologie') }}</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                {{ __('Une approche structurée pour garantir le succès de vos projets, de l\'analyse à la maintenance.') }}
            </p>
        </div>
    </section>

    <!-- Methodology Steps -->
    <section class="py-20 bg-white">
        <div class="container-custom">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="absolute -top-6 left-8 text-6xl font-black text-gray-200 z-0">01</div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-primary-900 mb-4">{{ __('Analyse Métier') }}</h3>
                        <p class="text-gray-600">{{ __('Nous commençons toujours par écouter. Nous analysons vos processus existants, identifions les goulots d\'étranglement et définissons ensemble les KPIs à atteindre.') }}</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="absolute -top-6 left-8 text-6xl font-black text-gray-200 z-0">02</div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-primary-900 mb-4">{{ __('Cadrage & Conception') }}</h3>
                        <p class="text-gray-600">{{ __('Nous élaborons une architecture solution détaillée. Choix technologiques, maquettes UX/UI et planning de déploiement sont validés avant tout code.') }}</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="absolute -top-6 left-8 text-6xl font-black text-gray-200 z-0">03</div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-primary-900 mb-4">{{ __('Développement Agile') }}</h3>
                        <p class="text-gray-600">{{ __('Nos développeurs experts construisent votre solution par itérations (sprints), vous donnant de la visibilité et la possibilité d\'ajuster le tir rapidement.') }}</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="absolute -top-6 left-8 text-6xl font-black text-gray-200 z-0">04</div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-primary-900 mb-4">{{ __('Tests & Formation') }}</h3>
                        <p class="text-gray-600">{{ __('Rien n\'est laissé au hasard. Tests unitaires, tests de charge et surtout formation approfondie de vos équipes pour assurer l\'adoption de l\'outil.') }}</p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="relative p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="absolute -top-6 left-8 text-6xl font-black text-gray-200 z-0">05</div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-primary-900 mb-4">{{ __('Support & Évolution') }}</h3>
                        <p class="text-gray-600">{{ __('Le Go-Live n\'est que le début. Nous restons à vos côtés pour la maintenance, le support et les évolutions futures de votre plateforme.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-20 bg-primary-900 text-white">
        <div class="container-custom">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl lg:text-5xl font-bold text-secondary-500 mb-2">50+</div>
                    <div class="text-gray-300">{{ __('Projets Odoo réussis') }}</div>
                </div>
                <div>
                    <div class="text-4xl lg:text-5xl font-bold text-secondary-500 mb-2">10+</div>
                    <div class="text-gray-300">{{ __('Années d\'expérience') }}</div>
                </div>
                <div>
                    <div class="text-4xl lg:text-5xl font-bold text-secondary-500 mb-2">98%</div>
                    <div class="text-gray-300">{{ __('Satisfaction client') }}</div>
                </div>
                <div>
                    <div class="text-4xl lg:text-5xl font-bold text-secondary-500 mb-2">24/7</div>
                    <div class="text-gray-300">{{ __('Support technique') }}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
