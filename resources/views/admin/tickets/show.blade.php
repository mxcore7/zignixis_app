@extends('layouts.admin')

@section('title', 'Ticket #' . $ticket->id)

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <nav class="sm:hidden" aria-label="Back">
            <a href="{{ route('admin.tickets.index') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
                Retour
            </a>
        </nav>
        <nav class="hidden sm:flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex">
                        <a href="{{ route('admin.tickets.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Tickets</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">#{{ $ticket->id }}</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <!-- Conversation Column -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Original Message -->
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
            <div class="flex space-x-3">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ $ticket->user->profile_photo ? asset('storage/'.$ticket->user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($ticket->user->name) }}" alt="">
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-semibold text-gray-900">
                        <a href="#" class="hover:underline">{{ $ticket->user->name }}</a>
                    </p>
                    <p class="text-sm text-gray-500">
                        <a href="#" class="hover:underline">{{ $ticket->created_at->translatedFormat('d F Y à H:i') }}</a>
                    </p>
                </div>
                <div class="flex-shrink-0">
                     <span class="inline-flex items-center rounded-md bg-{{ $ticket->status_color }}-50 px-2 py-1 text-xs font-medium text-{{ $ticket->status_color }}-700 ring-1 ring-inset ring-{{ $ticket->status_color }}-600/20">
                        {{ $ticket->status_label }}
                    </span>
                </div>
            </div>
            <div class="mt-4 space-y-4 text-base text-gray-700">
                <h2 class="text-lg font-bold">{{ $ticket->subject }}</h2>
                <p>{!! nl2br(e($ticket->message)) !!}</p>
            </div>
        </div>

        <!-- Replies -->
        @foreach($ticket->replies as $reply)
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6 {{ $reply->user_id === auth()->id() ? 'border-l-4 border-primary-500' : '' }}">
                <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ $reply->user->profile_photo ? asset('storage/'.$reply->user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($reply->user->name) }}" alt="">
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-900">
                            {{ $reply->user->name }}
                             @if($reply->user->role === 'admin' || $reply->user_id === auth()->id())
                                <span class="bg-primary-100 text-primary-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded">Support</span>
                            @endif
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $reply->created_at->translatedFormat('d F Y à H:i') }}
                        </p>
                        <div class="mt-2 text-sm text-gray-700">
                            <p>{!! nl2br(e($reply->message)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Reply Form -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Répondre</h3>
                <form action="{{ route('admin.tickets.reply', $ticket) }}" method="POST" class="mt-5">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Statut du ticket après réponse</label>
                        <select id="status" name="status" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6">
                            <option value="answered" selected>Répondu</option>
                            <option value="open">Laisser Ouvert</option>
                            <option value="closed">Fermer le ticket</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="sr-only">Votre réponse</label>
                        <textarea id="message" name="message" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6" placeholder="Écrivez votre réponse ici..."></textarea>
                    </div>
                    
                    <div class="mt-3 flex justify-end">
                        <button type="submit" class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Envoyer la réponse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div class="space-y-6">
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
            <h2 class="text-sm font-medium text-gray-500">Détails du client</h2>
            <div class="mt-4">
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                         <img class="h-10 w-10 rounded-full" src="{{ $ticket->user->profile_photo ? asset('storage/'.$ticket->user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($ticket->user->name) }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">{{ $ticket->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $ticket->user->email }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
            <h2 class="text-sm font-medium text-gray-500">Infos Ticket</h2>
            <dl class="mt-4 grid grid-cols-1 gap-x-4 gap-y-6">
                <div>
                     <dt class="text-sm font-medium text-gray-500">Priorité</dt>
                     <dd class="mt-1 text-sm text-gray-900">{{ $ticket->priority_label }}</dd>
                </div>
                <div>
                     <dt class="text-sm font-medium text-gray-500">Créé le</dt>
                     <dd class="mt-1 text-sm text-gray-900">{{ $ticket->created_at->format('d/m/Y H:i') }}</dd>
                </div>
                 <div>
                     <dt class="text-sm font-medium text-gray-500">Dernière maj</dt>
                     <dd class="mt-1 text-sm text-gray-900">{{ $ticket->updated_at->diffForHumans() }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
