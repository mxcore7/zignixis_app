<header x-data="{ mobileMenuOpen: false }" class="bg-white shadow-sm sticky top-0 z-50 transition-all duration-300">
    <nav class="container-custom mx-auto flex items-center justify-between h-20" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex items-center gap-3">
                <img class="h-10 w-auto" src="{{ asset('logo.jpg') }}" alt="Zygnixis Logo">
                <span class="font-display font-bold text-xl text-primary-900 tracking-tight">Zygnixis</span>
            </a>
        </div>
        
        <div class="flex lg:hidden">
            <button type="button" @click="mobileMenuOpen = true" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Ouvrir le menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex lg:gap-x-8">
            <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">Accueil</a>
            <a href="{{ route('about') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">À propos</a>
            <a href="{{ route('solutions') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('solutions') ? 'text-primary-600' : '' }}">Solutions Odoo</a>
            <a href="{{ route('expertise') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('expertise') ? 'text-primary-600' : '' }}">Expertise</a>
            <a href="{{ route('projects') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('projects') ? 'text-primary-600' : '' }}">Réalisations</a>
            <a href="{{ route('blog') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary-600 transition-colors {{ request()->routeIs('blog') ? 'text-primary-600' : '' }}">Blog</a>
        </div>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-4 items-center">
            <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-gray-900 group">
                Contact <span aria-hidden="true" class="group-hover:translate-x-1 inline-block transition-transform">&rarr;</span>
            </a>
            <a href="{{ route('contact') }}" class="btn-primary text-sm px-4 py-2">Demander une démo</a>
        </div>
    </nav>
    
    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="lg:hidden" role="dialog" aria-modal="true" x-cloak>
        <div class="fixed inset-0 z-50"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex items-center gap-2">
                    <img class="h-8 w-auto" src="{{ asset('logo.jpg') }}" alt="Zygnixis">
                    <span class="font-display font-bold text-lg text-primary-900">Zygnixis</span>
                </a>
                <button type="button" @click="mobileMenuOpen = false" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Fermer le menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('home') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Accueil</a>
                        <a href="{{ route('about') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">À propos</a>
                        <a href="{{ route('solutions') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Solutions Odoo</a>
                        <a href="{{ route('expertise') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Expertise</a>
                        <a href="{{ route('projects') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Réalisations</a>
                        <a href="{{ route('blog') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                        <a href="{{ route('contact') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact</a>
                    </div>
                    <div class="py-6">
                        <a href="{{ route('contact') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Demander une démo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
