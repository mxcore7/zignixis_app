<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl bg-white shadow-lg']) }}>
    <div class="p-6">
        {{ $slot }}
    </div>
</div>
