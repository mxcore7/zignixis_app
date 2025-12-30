@extends('layouts.app')

@section('title', 'Solutions Odoo & Sécurité - Zygnixis')

@section('content')
    <!-- Hero -->
    <section class="bg-primary-900 py-20 text-white">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold mb-6">Nos Solutions</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Des outils performants pour une gestion d'entreprise sans faille.
            </p>
        </div>
    </section>

    <!-- Odoo Modules -->
    <section class="py-20 bg-white" x-data="{ activeTab: '{{ $odooModules->first()->id ?? 0 }}' }">
        <div class="container-custom">
            <div class="lg:grid lg:grid-cols-4 gap-8">
                <!-- Sidebar Menu -->
                <div class="mb-8 lg:mb-0">
                    <h3 class="font-bold text-xl mb-4 px-4">Modules Odoo</h3>
                    <nav class="space-y-1">
                        @foreach($odooModules as $module)
                            <button @click="activeTab = '{{ $module->id }}'" 
                                :class="{ 'bg-primary-50 text-primary-700 border-l-4 border-primary-500': activeTab === '{{ $module->id }}', 'text-gray-600 hover:bg-gray-50': activeTab !== '{{ $module->id }}' }" 
                                class="w-full text-left px-4 py-3 font-medium rounded-r-lg transition-colors">
                                {{ $module->getTranslation('name', 'fr') }}
                            </button>
                        @endforeach
                    </nav>
                </div>

                <!-- Content Area -->
                <div class="lg:col-span-3">
                    @foreach($odooModules as $module)
                        <div x-show="activeTab === '{{ $module->id }}'" x-transition.opacity class="bg-gray-50 p-8 rounded-2xl border border-gray-100" style="display: none;">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-primary-100 text-primary-600 rounded-lg">
                                    <i class="fas fa-{{ $module->icon }} fa-2x"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">{{ $module->getTranslation('name', 'fr') }}</h2>
                            </div>
                            <p class="text-lg text-gray-600 mb-8">
                                {{ $module->getTranslation('description', 'fr') }}
                            </p>
                            
                            @if($module->features && count($module->features) > 0)
                                <ul class="grid md:grid-cols-2 gap-4 mb-8">
                                    @foreach($module->features as $feature)
                                        <li class="flex items-center text-gray-700">
                                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($module->link)
                                <a href="{{ $module->link }}" target="_blank" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold">
                                    En savoir plus sur Odoo.com
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            @endif
                        </div>
                    @endforeach
                    
                    @if($odooModules->isEmpty())
                        <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 text-center">
                            <p class="text-gray-500">Aucun module configuré pour le moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Electronic Security Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="container-custom">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-display font-bold mb-6 text-white">Sécurité Électronique Avancée</h2>
                    <p class="text-gray-300 mb-8">
                        Au-delà du logiciel, nous sécurisons vos locaux physiques. Nos solutions de vidéosurveillance et de contrôle d'accès s'intègrent parfaitement à votre infrastructure réseau.
                    </p>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">CCTV & Vidéosurveillance IP</h4>
                                <p class="text-sm text-gray-400">Caméras HD/4K avec vision nocturne et détection de mouvement.</p>
                            </div>
                        </div>
                         <div class="flex gap-4">
                            <div class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Contrôle d'Accès Biométrique</h4>
                                <p class="text-sm text-gray-400">Gestion des entrées/sorties par empreinte, badge ou reconnaissance faciale.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="bg-gray-800 p-2 rounded-xl">
                        <!-- Placeholder Image -->
                        <div class="bg-gray-700 aspect-video rounded-lg flex items-center justify-center text-gray-500">
                             <span class="font-bold">Security Center Interface</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
