@extends('layouts.client')

@section('title', 'Nouveau Ticket')

@section('content')
<div class="lg:flex lg:items-center lg:justify-between mb-8">
    <div class="min-w-0 flex-1">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex">
                        <a href="{{ route('client.tickets.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Support</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <span class="ml-4 text-sm font-medium text-gray-500">Nouveau Ticket</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Ouvrir un ticket</h2>
    </div>
</div>

<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('client.tickets.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Sujet</label>
                <div class="mt-2">
                    <input type="text" name="subject" id="subject" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="priority" class="block text-sm font-medium leading-6 text-gray-900">Priorité</label>
                <div class="mt-2">
                    <select id="priority" name="priority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="low">Basse (Information)</option>
                        <option value="medium" selected>Moyenne (Problème mineur)</option>
                        <option value="high">Haute (Bloquant)</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
                <div class="mt-2">
                    <textarea id="message" name="message" rows="4" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Décrivez votre problème avec le plus de détails possible.</p>
            </div>

            <div class="flex justify-end gap-x-3">
                <a href="{{ route('client.tickets.index') }}" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Annuler</a>
                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Envoyer</button>
            </div>
        </form>
    </div>
</div>
@endsection
