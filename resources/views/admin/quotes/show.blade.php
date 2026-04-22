@extends('layouts.admin')

@section('title', 'Détails de la demande de devis')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                Demande de devis : {{ $quote->company_name ?? $quote->contact_name }}
            </h2>
            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                    </svg>
                    Reçue le {{ $quote->created_at->format('d/m/Y à H:i') }}
                </div>
            </div>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <a href="{{ route('admin.quotes.index') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Retour à la liste
            </a>
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

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Main details -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Step 1 & 2: Project Nature & Timeline -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Nature du projet & Délais</h3>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Type de projet</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900">{{ $quote->final_project_type }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Échéance souhaitée</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->timeline_urgency }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Contrainte de date</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if($quote->is_date_fixed)
                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Date fixe imposée</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Flexible</span>
                            @endif
                        </dd>
                    </div>
                    @if($quote->start_date)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Date de démarrage indicative</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->start_date }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            <!-- Step 3: Budget -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Budget</h3>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fourchette budgétaire</dt>
                        <dd class="mt-1 text-lg font-bold text-primary-600">{{ $quote->budget_range }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Mode de financement</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->funding_mode ?? 'Non précisé' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Step 4: Company Context -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Contexte Entreprise</h3>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Secteur d'activité</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->industry }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Taille de l'entreprise</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->company_size }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Localisation</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->city }}, {{ $quote->country }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Système existant</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->existing_system }}</dd>
                    </div>
                    @if($quote->users_count)
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nombre d'utilisateurs prévus</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->users_count }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            <!-- Step 5: Description Detaille -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Description Détaillée du Besoin</h3>
                <div class="space-y-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Description du projet</h4>
                        <div class="mt-2 text-sm text-gray-900 whitespace-pre-wrap bg-gray-50 p-4 rounded-md border border-gray-100">{{ $quote->description }}</div>
                    </div>
                    
                    @if($quote->references)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Références / Exemples</h4>
                        <div class="mt-2 text-sm text-gray-900 whitespace-pre-wrap bg-gray-50 p-4 rounded-md border border-gray-100">{{ $quote->references }}</div>
                    </div>
                    @endif

                    @if($quote->priority_features)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Fonctionnalités prioritaires</h4>
                        <div class="mt-2 text-sm text-gray-900 whitespace-pre-wrap bg-gray-50 p-4 rounded-md border border-gray-100">{{ $quote->priority_features }}</div>
                    </div>
                    @endif

                    @if($quote->technical_constraints)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Contraintes techniques</h4>
                        <div class="mt-2 text-sm text-gray-900 whitespace-pre-wrap bg-gray-50 p-4 rounded-md border border-gray-100">{{ $quote->technical_constraints }}</div>
                    </div>
                    @endif
                </div>
            </div>
            
        </div>

        <!-- Sidebar details -->
        <div class="space-y-6">
            
            <!-- Management Card -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Gestion</h3>
                <form action="{{ route('admin.quotes.update_status', $quote) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Statut du devis</label>
                        <select id="status" name="status" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6">
                            <option value="new" {{ $quote->status === 'new' ? 'selected' : '' }}>Nouveau</option>
                            <option value="in_progress" {{ $quote->status === 'in_progress' ? 'selected' : '' }}>En cours de traitement</option>
                            <option value="completed" {{ $quote->status === 'completed' ? 'selected' : '' }}>Traité / Devis envoyé</option>
                            <option value="rejected" {{ $quote->status === 'rejected' ? 'selected' : '' }}>Rejeté / Sans suite</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="admin_notes" class="block text-sm font-medium leading-6 text-gray-900">Notes internes</label>
                        <textarea id="admin_notes" name="admin_notes" rows="4" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6" placeholder="Notes visibles uniquement par l'équipe">{{ $quote->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="w-full rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Enregistrer
                    </button>
                </form>
            </div>

            <!-- Contact Card -->
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900 border-b pb-4 mb-4">Coordonnées du prospect</h3>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nom & Prénom</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900">{{ $quote->contact_name }}</dd>
                    </div>
                    @if($quote->company_name)
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Entreprise</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->company_name }}</dd>
                    </div>
                    @endif
                    @if($quote->job_title)
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fonction / Poste</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->job_title }}</dd>
                    </div>
                    @endif
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $quote->email }}" class="text-primary-600 hover:text-primary-900">{{ $quote->email }}</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Téléphone / WhatsApp</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="tel:{{ $quote->phone }}" class="text-primary-600 hover:text-primary-900">{{ $quote->phone }}</a>
                        </dd>
                    </div>
                    @if($quote->discovery_source)
                    <div class="pt-4 border-t border-gray-100">
                        <dt class="text-sm font-medium text-gray-500">Source de découverte</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->discovery_source }}</dd>
                    </div>
                    @endif
                    <div class="pt-4 border-t border-gray-100">
                        <dt class="text-sm font-medium text-gray-500">Validation</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if($quote->serious_commitment)
                                <span class="inline-flex items-center text-green-700">
                                    <svg class="mr-1.5 h-5 w-5 fill-current" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    Engagement sérieux confirmé
                                </span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
