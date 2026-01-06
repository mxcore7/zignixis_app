@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8" x-data="mediaLibrary()">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Médiathèque</h1>
            <p class="mt-2 text-sm text-gray-700">Gérez vos images et documents. Glissez-déposez des fichiers pour les uploader.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button type="button" @click="$refs.fileInput.click()" class="block rounded-md bg-primary-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                <svg class="-ml-0.5 mr-1.5 h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Uploader
            </button>
            <input type="file" x-ref="fileInput" class="hidden" multiple @change="uploadFiles($event)">
        </div>
    </div>

    <!-- Drag & Drop Zone / Filters -->
    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center bg-gray-50 p-4 rounded-lg border border-dashed border-gray-300"
         @dragover.prevent="dragOver = true"
         @dragleave.prevent="dragOver = false"
         @drop.prevent="handleDrop($event)"
         :class="{ 'border-primary-500 bg-primary-50': dragOver }">
        
        <div class="flex items-center gap-4">
            <div class="relative">
                <select onchange="window.location.href=this.value" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6">
                    <option value="{{ route('admin.media.index') }}">Toutes les catégories</option>
                    @foreach($categories as $cat)
                        <option value="{{ route('admin.media.index', ['category' => $cat]) }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <form action="{{ route('admin.media.index') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher..." class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500 hover:text-gray-900">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="text-sm text-gray-500 text-center sm:text-right">
            <span x-show="!isUploading">Glissez des fichiers ici ou cliquez sur Uploader</span>
            <span x-show="isUploading" class="text-primary-600 font-semibold">Upload en cours...</span>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="mt-8 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
        @forelse($media as $item)
            <div class="relative group card-glow rounded-lg overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 transition-all hover:shadow-md">
                <div class="aspect-h-7 aspect-w-10 block w-full overflow-hidden bg-gray-100 focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                    @if($item->type === 'image')
                        <img src="{{ $item->url }}" alt="{{ $item->alt_text }}" class="pointer-events-none object-cover group-hover:opacity-75 h-40 w-full transition-transform duration-300 group-hover:scale-105">
                    @else
                        <div class="flex h-40 items-center justify-center bg-gray-50 text-gray-400">
                            <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    @endif
                    <button type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View details for {{ $item->name }}</span>
                    </button>
                </div>
                <div class="p-3">
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ $item->name }}</p>
                    <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ $item->size_formatted }}</p>
                    <div class="mt-2 flex justify-between items-center">
                        <span class="inline-flex items-center rounded-full bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $item->category }}</span>
                        <div class="flex gap-2">
                             <!-- Copy Link -->
                            <button @click="copyToClipboard('{{ $item->url }}')" class="text-gray-400 hover:text-primary-600" title="Copier le lien">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                            </button>
                            <!-- Delete -->
                            <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600" title="Supprimer">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded-lg border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">Aucun média</h3>
                <p class="mt-1 text-sm text-gray-500">Commencez par uploader des images ou des documents.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $media->links() }}
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('mediaLibrary', () => ({
            dragOver: false,
            isUploading: false,
            
            handleDrop(e) {
                this.dragOver = false;
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    this.uploadFiles({ target: { files: files } });
                }
            },

            uploadFiles(e) {
                const files = e.target.files;
                if (!files.length) return;

                this.isUploading = true;
                const formData = new FormData();
                
                for (let i = 0; i < files.length; i++) {
                    formData.append('files[]', files[i]);
                }
                
                // Add default category if filters selected
                const urlParams = new URLSearchParams(window.location.search);
                const category = urlParams.get('category') || 'general';
                formData.append('category', category);

                fetch('{{ route('admin.media.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Erreur lors de l\'upload');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Erreur lors de l\'upload');
                })
                .finally(() => {
                    this.isUploading = false;
                });
            },

            copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    alert('Lien copié !');
                });
            }
        }))
    })
</script>
@endpush
@endsection
