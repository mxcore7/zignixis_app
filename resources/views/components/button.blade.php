@props(['variant' => 'primary', 'type' => 'button'])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-md px-3.5 py-2.5 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition-colors duration-200';
    
    $variants = [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-500 focus-visible:outline-primary-600',
        'secondary' => 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50',
        'danger' => 'bg-red-600 text-white hover:bg-red-500 focus-visible:outline-red-600',
        'outline' => 'bg-transparent text-primary-600 ring-1 ring-inset ring-primary-600 hover:bg-primary-50',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
