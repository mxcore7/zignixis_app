@props(['name', 'label', 'value' => [], 'required' => false, 'rows' => 3])

<div x-data="{ lang: 'fr' }" class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        {{ $label }}
        @if($required) <span class="text-red-500">*</span> @endif
    </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="flex space-x-2 mb-2">
            <button type="button" @click="lang = 'fr'" :class="{'text-primary-600 font-bold border-b-2 border-primary-600': lang === 'fr', 'text-gray-500': lang !== 'fr'}" class="px-2 py-1 text-xs">Français</button>
            <button type="button" @click="lang = 'en'" :class="{'text-primary-600 font-bold border-b-2 border-primary-600': lang === 'en', 'text-gray-500': lang !== 'en'}" class="px-2 py-1 text-xs">Anglais</button>
        </div>

        <div x-show="lang === 'fr'">
            <textarea name="{{ $name }}[fr]" rows="{{ $rows }}" class="max-w-lg shadow-sm block w-full focus:ring-primary-500 focus:border-primary-500 sm:text-sm border border-gray-300 rounded-md" placeholder="En Français">{{ $value['fr'] ?? old($name.'.fr') }}</textarea>
        </div>
        <div x-show="lang === 'en'" style="display: none;">
            <textarea name="{{ $name }}[en]" rows="{{ $rows }}" class="max-w-lg shadow-sm block w-full focus:ring-primary-500 focus:border-primary-500 sm:text-sm border border-gray-300 rounded-md" placeholder="In English">{{ $value['en'] ?? old($name.'.en') }}</textarea>
        </div>

        @error($name.'.fr') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        @error($name.'.en') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
</div>
