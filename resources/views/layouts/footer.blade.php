<footer class="bg-gray-900 text-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="container-custom mx-auto pt-16 pb-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img class="h-10 w-auto rounded" src="{{ asset('logo.jpg') }}" alt="Zygnixis Logo">
                    <span class="font-display font-bold text-2xl text-white">Zygnixis</span>
                </a>
                <p class="text-sm leading-6 text-gray-300 max-w-sm">
                    Votre partenaire de confiance pour la transformation digitale, l'intégration Odoo et la sécurité électronique au Cameroun et en Afrique Centrale.
                </p>
                <div class="flex space-x-6">
                    @if($globalSettings->get('social_facebook')?->value)
                        <a href="{{ $globalSettings->get('social_facebook')->value }}" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    @if($globalSettings->get('social_linkedin')?->value)
                        <a href="{{ $globalSettings->get('social_linkedin')->value }}" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    @if($globalSettings->get('social_twitter')?->value)
                        <a href="{{ $globalSettings->get('social_twitter')->value }}" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white tracking-wider uppercase">Solutions</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Intégration Odoo</a></li>
                            <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Développement Web</a></li>
                            <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Sécurité Électronique</a></li>
                            <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Formation & Support</a></li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-white tracking-wider uppercase">Entreprise</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li><a href="{{ route('about') }}" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">À propos</a></li>
                            <li><a href="{{ route('projects') }}" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Réalisations</a></li>
                            <li><a href="{{ route('blog') }}" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Blog</a></li>
                            <li><a href="{{ route('contact') }}" class="text-sm leading-6 text-gray-300 hover:text-white transition-colors">Carrières</a></li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white tracking-wider uppercase">Contact</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            @if($globalContactInfo->get('address'))
                                <li class="text-sm leading-6 text-gray-300">{{ $globalContactInfo->get('address')->getLocalizedValue() }}</li>
                            @endif
                            @if($globalContactInfo->get('email_principal'))
                                <li class="text-sm leading-6 text-gray-300">{{ $globalContactInfo->get('email_principal')->value }}</li>
                            @endif
                            @if($globalContactInfo->get('phone_principal'))
                                <li class="text-sm leading-6 text-gray-300">{{ $globalContactInfo->get('phone_principal')->value }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-white tracking-wider uppercase">Newsletter</h3>
                        <p class="mt-2 text-sm text-gray-300">Restez informé de nos dernières actualités.</p>
                        <!-- Livewire component placeholder -->
                        <!-- Livewire component -->
                        <livewire:newsletter-subscription />
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
            <p class="text-xs leading-5 text-gray-400 text-center">&copy; {{ date('Y') }} Zygnixis SARL. Tous droits réduits. Designed with Laravel.</p>
        </div>
    </div>
</footer>
