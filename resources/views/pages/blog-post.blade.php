@extends('layouts.app')

@section('title', $post->title . ' - Blog Zygnixis')
@section('meta_description', $post->excerpt)

@section('content')
    <!-- Post Header -->
    <header class="bg-gray-50 py-16 lg:py-24 border-b border-gray-200">
        <div class="container-custom max-w-4xl mx-auto text-center">
            @if($post->category)
                <a href="#" class="inline-block bg-primary-100 text-primary-700 font-bold px-3 py-1 rounded-full text-sm mb-6 hover:bg-primary-200 transition-colors">
                    {{ $post->category->name }}
                </a>
            @endif
            <h1 class="text-3xl lg:text-5xl font-display font-bold text-gray-900 mb-6 leading-tight">{{ $post->title }}</h1>
            <div class="flex items-center justify-center text-gray-500 text-sm gap-6">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    {{ $post->author->name ?? 'Zygnixis' }}
                </div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}
                </div>
                <div class="hidden sm:flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min de lecture
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    @if($post->featured_image)
    <div class="container-custom max-w-5xl mx-auto -mt-12 relative z-10 px-4">
        <div class="rounded-2xl overflow-hidden shadow-2xl">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto">
        </div>
    </div>
    @endif

    <div class="container-custom max-w-4xl mx-auto py-16 grid lg:grid-cols-12 gap-12">
        <!-- Sidebar (Share) -->
        <div class="lg:col-span-1 hidden lg:block">
            <div class="sticky top-24 flex flex-col gap-4 items-center">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest vertical-rl mb-4">Partager</span>
                <a href="#" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-colors shadow-sm">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500 transition-colors shadow-sm">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-blue-700 text-white flex items-center justify-center hover:bg-blue-800 transition-colors shadow-sm">
                     <span class="sr-only">LinkedIn</span>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
            </div>
        </div>

        <!-- Content -->
        <article class="lg:col-span-10 prose prose-lg prose-indigo max-w-none">
            {!! $post->content !!}
        </article>
    </div>

    <!-- Related Posts -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
    <section class="bg-gray-50 py-16 border-t border-gray-200">
        <div class="container-custom">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Articles Similaires</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $related)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <a href="{{ route('blog.show', $related->slug) }}" class="block h-40 bg-gray-200 overflow-hidden">
                             @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                            @endif
                        </a>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2 leading-tight">
                                <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-primary-600 transition-colors">{{ $related->title }}</a>
                            </h3>
                            <a href="{{ route('blog.show', $related->slug) }}" class="text-sm text-primary-600 font-semibold mt-2 inline-block">Lire la suite &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
