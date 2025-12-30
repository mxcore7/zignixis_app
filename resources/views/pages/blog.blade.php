@extends('layouts.app')

@section('title', 'Le Blog Zygnixis - Actualités & Conseils')

@section('content')
    <section class="bg-gray-50 py-12 md:py-20 border-b border-gray-200">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold text-primary-900 mb-4">Le Blog Zygnixis</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Conseils d'experts, actualités Odoo et tendances de la transformation digitale.
            </p>
        </div>
    </section>

    <section class="py-16">
        <div class="container-custom">
            <div class="lg:grid lg:grid-cols-4 gap-12">
                
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <div class="grid md:grid-cols-2 gap-8">
                        @forelse($posts as $post)
                            <article class="flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <a href="{{ route('blog.show', $post->slug) }}" class="h-56 bg-gray-200 block relative overflow-hidden group">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    @if($post->category)
                                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-primary-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                </a>
                                <div class="flex-1 p-6 flex flex-col">
                                    <div class="text-sm text-gray-500 mb-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}
                                        <span class="mx-2">•</span>
                                        <span>{{ $post->author->name ?? 'Zygnixis Team' }}</span>
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary-600 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                    </p>
                                    <div class="mt-auto">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="text-secondary-600 font-semibold text-sm hover:text-secondary-700 inline-flex items-center">
                                            Lire l'article <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-full py-12 text-center text-gray-500">
                                Aucun article publié pour le moment.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12">
                        {{ $posts->links('pagination::tailwind') }}
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1 space-y-8 mt-12 lg:mt-0">
                    <!-- Search Widget -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">Recherche</h3>
                        <form action="#" class="relative">
                            <input type="text" placeholder="Mots-clés..." class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500 pl-4 pr-10">
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    @if(isset($categories) && count($categories) > 0)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">Catégories</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $category)
                                <li>
                                    <a href="#" class="flex justify-between items-center text-gray-600 hover:text-primary-600 transition-colors group">
                                        <span>{{ $category->name }}</span>
                                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full group-hover:bg-primary-50 group-hover:text-primary-600">{{ $category->posts_count ?? 0 }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Newsletter Widget -->
                    <div class="bg-primary-50 p-6 rounded-xl border border-primary-100">
                        <h3 class="font-bold text-primary-900 mb-2">Newsletter</h3>
                        <p class="text-sm text-gray-600 mb-4">Recevez nos derniers conseils directement dans votre boîte mail.</p>
                        <form action="#">
                            <input type="email" placeholder="Votre email" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500 mb-3">
                            <button type="submit" class="w-full btn-primary text-sm">S'abonner</button>
                        </form>
                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
