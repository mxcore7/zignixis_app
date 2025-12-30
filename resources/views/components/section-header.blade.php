@props(['title', 'subtitle' => null])

<div class="mb-8">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
    @if($subtitle)
        <p class="mt-2 text-lg leading-8 text-gray-600">{{ $subtitle }}</p>
    @endif
</div>
