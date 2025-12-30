@extends('layouts.app')

@section('title', 'Contactez-nous - Zygnixis')

@section('content')
    <div class="bg-gray-50 py-12 lg:py-24">
        <div class="container-custom">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-display font-bold text-primary-900 mb-4">Contactez-nous</h1>
                <p class="text-gray-600 text-lg">Vous avez un projet ? Une question ? Notre équipe est à votre écoute pour vous accompagner dans votre transformation digitale.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start">
                
                <!-- Contact Info -->
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Nos Coordonnées</h2>
                    
                    <div class="space-y-8">
                        <!-- Address -->
                        @foreach($globalContactInfo->where('type', 'address') as $info)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">Adresse</h3>
                                    <p class="mt-1 text-base leading-6 text-gray-600">
                                        @if(is_array($info->value))
                                            {{ $info->value[app()->getLocale()] ?? $info->value['fr'] ?? '' }}
                                        @else
                                            {{ $info->value }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach

                        <!-- Phone -->
                        @php
                            $phones = $globalContactInfo->where('type', 'phone');
                        @endphp
                        @if($phones->isNotEmpty())
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">Téléphone</h3>
                                    @foreach($phones as $info)
                                        <p class="mt-1 text-base leading-6 text-gray-600">{{ $info->value }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Email -->
                        @php
                            $emails = $globalContactInfo->where('type', 'email');
                        @endphp
                        @if($emails->isNotEmpty())
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">Email</h3>
                                    @foreach($emails as $info)
                                        <p class="mt-1 text-base leading-6 text-gray-600">{{ $info->value }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Map Placeholder -->
                    <div class="mt-10 h-64 bg-gray-200 rounded-xl overflow-hidden relative">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-500 font-bold">
                            Google Maps Integration
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15919.246419080215!2d9.69344!3d4.051056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1645000000000!5m2!1sfr!2scm" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Contact Form Component Placeholder -->
                <!-- Contact Form Component -->
                <livewire:contact-form />
            </div>
        </div>
    </div>
@endsection
