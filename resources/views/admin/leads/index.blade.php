@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Pipeline CRM</h1>
            <p class="mt-2 text-sm text-gray-700">Gérez vos opportunités commerciales du premier contact jusqu'à la vente.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('admin.leads.create') }}" class="block rounded-md bg-primary-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                + Nouveau Lead
            </a>
        </div>
    </div>

    <!-- Kanban Board -->
    <div class="flex-1 overflow-x-auto overflow-y-hidden mt-8" x-data="kanbanBoard()">
        <div class="flex h-full gap-4 pb-4 min-w-[1200px]">
            @foreach($statuses as $key => $status)
                <!-- Column: {{ $status['label'] }} -->
                <div class="flex-shrink-0 w-80 flex flex-col bg-gray-50 rounded-lg h-full max-h-[calc(100vh-250px)]">
                    <!-- Column Header -->
                    <div class="p-3 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-gray-50 rounded-t-lg z-10">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-{{ $status['color'] }}-500"></span>
                            <h3 class="font-medium text-gray-900 text-sm">{{ $status['label'] }}</h3>
                            <span class="bg-gray-200 text-gray-600 py-0.5 px-2 rounded-full text-xs font-medium">{{ $leads->where('status', $key)->count() }}</span>
                        </div>
                    </div>

                    <!-- Column Content (Drag Zone) -->
                    <div class="flex-1 p-2 overflow-y-auto space-y-3 min-h-[100px]"
                         @dragover.prevent="dragOver($event)"
                         @drop.prevent="drop($event, '{{ $key }}')"
                         id="col-{{ $key }}">
                        
                        @foreach($leads->where('status', $key) as $lead)
                            <div class="bg-white p-4 rounded-md shadow-sm border border-gray-200 cursor-move hover:shadow-md transition-shadow relative group"
                                 draggable="true"
                                 @dragstart="dragStart($event, {{ $lead->id }})"
                                 data-id="{{ $lead->id }}">
                                
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-sm font-medium text-gray-900">{{ $lead->name }}</h4>
                                    <!-- Options Dropdown (Hidden until hover) -->
                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Supprimer ce lead ?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-500">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <p class="text-xs text-gray-500 mb-2 truncate">{{ $lead->company ?? 'Particulier' }}</p>
                                
                                @if($lead->estimated_value)
                                    <div class="flex items-center gap-1 mb-2">
                                        <span class="text-xs font-semibold text-gray-700">{{ number_format($lead->estimated_value, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                @endif

                                <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                    <div class="flex items-center gap-1">
                                        <span class="text-[10px] text-gray-400">{{ $lead->created_at->format('d/m') }}</span>
                                    </div>
                                    @if($lead->assignedUser)
                                        <img src="{{ $lead->assignedUser->profile_photo ? asset('storage/'.$lead->assignedUser->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($lead->assignedUser->name) }}" 
                                             class="h-5 w-5 rounded-full" title="{{ $lead->assignedUser->name }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('kanbanBoard', () => ({
            dragStart(e, id) {
                e.dataTransfer.setData('text/plain', id);
                e.target.classList.add('opacity-50');
            },
            dragOver(e) { e.preventDefault(); },
            drop(e, newStatus) {
                e.preventDefault();
                const id = e.dataTransfer.getData('text/plain');
                const draggedElement = document.querySelector(`[data-id="${id}"]`);
                if (draggedElement) {
                    draggedElement.classList.remove('opacity-50');
                    document.getElementById(`col-${newStatus}`).appendChild(draggedElement);
                    this.updateLeadStatus(id, newStatus);
                }
            },
            updateLeadStatus(id, status) {
                fetch(`/admin/leads/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ status: status })
                });
            }
        }))
    });
</script>
@endpush
@endsection
