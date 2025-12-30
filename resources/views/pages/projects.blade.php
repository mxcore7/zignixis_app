@extends('layouts.app')

@section('title', 'Nos Réalisations - Zygnixis')

@section('content')
    <section class="bg-primary-900 py-20 text-white">
        <div class="container-custom text-center">
            <h1 class="text-4xl lg:text-5xl font-display font-bold mb-6">Nos Réalisations</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Découvrez comment nous avons transformé les défis de nos clients en opportunités de croissance.
            </p>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container-custom">
            
            <!-- Projects Filter & Grid -->
            <livewire:project-filter />
        </div>
    </section>
@endsection
