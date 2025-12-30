<div x-data="{ filter: 'all' }">
    <!-- Filters -->
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button @click="filter = 'all'; $wire.setFilter('all')" 
            :class="filter === 'all' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
            class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
            Tous
        </button>
        <button @click="filter = 'Industrie'; $wire.setFilter('Industrie')"
            :class="filter === 'Industrie' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
            class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
            Industrie
        </button>
        <button @click="filter = 'Finance'; $wire.setFilter('Finance')"
            :class="filter === 'Finance' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
            class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
            Finance
        </button>
        <button @click="filter = 'Transport'; $wire.setFilter('Transport')"
            :class="filter === 'Transport' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
            class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
            Transport
        </button>
        <button @click="filter = 'Autre'; $wire.setFilter('Autre')"
            :class="filter === 'Autre' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
            class="px-6 py-2 rounded-full font-semibold transition-all duration-300">
            Autre
        </button>
    </div>

    <!-- Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 bg-gray-200 relative">
                    @if($project->featured_image)
                        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-primary-900 shadow-sm">
                        {{ $project->sector ?? 'Technologie' }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('projects.show', $project->slug) }}" class="text-secondary-600 font-semibold text-sm hover:text-secondary-700">Voir les détails &rarr;</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p>Aucun projet trouvé pour cette catégorie.</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-8">
        {{ $projects->links() }}
    </div>
</div>
