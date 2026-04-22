@extends('layouts.admin')

@section('title', 'Gestion des demandes de devis')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Demandes de Devis</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-6">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Contact / Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Projet</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Budget</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($quotes as $quote)
                                <tr class="{{ $quote->status === 'new' ? 'bg-blue-50/50' : '' }}">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold uppercase">
                                                    {{ substr($quote->contact_name, 0, 2) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900 {{ $quote->status === 'new' ? 'font-bold' : '' }}">{{ $quote->contact_name }}</div>
                                                <div class="text-gray-500">{{ $quote->company_name ?? 'Particulier' }}</div>
                                                <div class="text-xs text-gray-400 mt-1">{{ $quote->created_at->format('d M Y à H:i') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <div class="font-medium text-gray-900">{{ $quote->final_project_type }}</div>
                                        <div class="text-gray-500 text-xs mt-1">{{ $quote->industry }} • {{ $quote->company_size }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="font-semibold text-gray-900">{{ $quote->budget_range }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $quote->status_color }}">
                                            {{ $quote->status_label }}
                                        </span>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('admin.quotes.show', $quote) }}" class="text-primary-600 hover:text-primary-900 mr-4">Consulter</a>
                                        <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-3 py-4 text-sm text-gray-500 text-center">Aucune demande de devis pour le moment.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $quotes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
