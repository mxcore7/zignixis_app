@extends('layouts.admin')

@section('title', 'Modifier Campagne')

@section('content')
<div class="lg:flex lg:items-center lg:justify-between mb-8">
    <div class="min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Modifier Campagne</h2>
    </div>
</div>

<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ route('admin.newsletter.update', $campaign->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Sujet</label>
                <div class="mt-2">
                    <input type="text" name="subject" id="subject" value="{{ old('subject', $campaign->subject) }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Contenu</label>
                <div class="mt-2">
                     <textarea name="content" id="content" rows="10" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 tinymce">{{ old('content', $campaign->content) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end gap-x-3">
                <a href="{{ route('admin.newsletter.index') }}" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Annuler</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
