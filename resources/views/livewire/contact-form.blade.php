<div class="bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un message</h2>
    
    @if($success)
        <div class="mb-6 p-4 rounded-md bg-green-50 border border-green-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.</p>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <div class="grid sm:grid-cols-2 gap-6">
            <div>
                <label for="firstName" class="block text-sm font-semibold leading-6 text-gray-900">Prénom</label>
                <div class="mt-2.5">
                    <input type="text" wire:model="firstName" id="firstName" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('firstName') ring-red-300 focus:ring-red-500 @enderror">
                </div>
                @error('firstName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="lastName" class="block text-sm font-semibold leading-6 text-gray-900">Nom</label>
                <div class="mt-2.5">
                    <input type="text" wire:model="lastName" id="lastName" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('lastName') ring-red-300 focus:ring-red-500 @enderror">
                </div>
                @error('lastName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
            <div class="mt-2.5">
                <input type="email" wire:model="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('email') ring-red-300 focus:ring-red-500 @enderror">
            </div>
            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="phone" class="block text-sm font-semibold leading-6 text-gray-900">Téléphone</label>
            <div class="mt-2.5">
                <input type="tel" wire:model="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
            </div>
            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Message</label>
            <div class="mt-2.5">
                <textarea wire:model="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('message') ring-red-300 focus:ring-red-500 @enderror"></textarea>
            </div>
            @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" wire:loading.attr="disabled" class="block w-full rounded-md bg-primary-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Envoyer le message</span>
                <span wire:loading>Envoi en cours...</span>
            </button>
        </div>
    </form>
</div>
