@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')
<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-semibold leading-6 text-gray-900">Notifications</h1>
        <p class="mt-2 text-sm text-gray-700">Consultez l'historique complet de vos notifications système et activités.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <form action="{{ route('admin.notifications.mark-all-read') }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <svg class="-ml-0.5 mr-1.5 h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Tout marquer comme lu
            </button>
        </form>
    </div>
</div>

<div class="bg-white shadow sm:rounded-lg overflow-hidden">
    <ul role="list" class="divide-y divide-gray-200">
        @forelse($notifications as $notification)
            <li class="p-4 sm:px-6 hover:bg-gray-50 flex items-center justify-between {{ $notification->read ? 'opacity-70 bg-gray-50/50' : 'bg-white font-medium' }}">
                <div class="flex items-start space-x-3 min-w-0 flex-1">
                    <span class="text-2xl flex-shrink-0">{{ $notification->icon ?? '🔔' }}</span>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm text-gray-900">
                            {{ $notification->message }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ $notification->created_at->format('d/m/Y H:i') }} ({{ $notification->created_at->diffForHumans() }})
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 ml-4 flex-shrink-0">
                    @if($notification->url)
                        <a href="{{ route('admin.notifications.read', $notification) }}" class="text-primary-600 hover:text-primary-900 text-sm font-semibold">
                            Consulter &rarr;
                        </a>
                    @elseif(!$notification->read)
                        <form action="{{ route('admin.notifications.read', $notification) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-gray-500 hover:text-gray-900">Marquer comme lu</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.notifications.destroy', $notification) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette notification ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-600 text-sm" title="Supprimer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="p-8 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
                <p class="mt-2 text-sm">Aucune notification pour le moment.</p>
            </li>
        @endforelse
    </ul>
    
    @if($notifications->hasPages())
        <div class="px-4 py-3 border-t border-gray-200">
            {{ $notifications->links() }}
        </div>
    @endif
</div>
@endsection
