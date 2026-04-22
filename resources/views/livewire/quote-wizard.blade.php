<div>
    @if($success)
        <div class="text-center py-16 bg-white rounded-2xl shadow-xl border border-gray-100 max-w-2xl mx-auto">
            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-green-100 mb-6">
                <svg class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
            <h2 class="text-3xl font-display font-bold text-gray-900 mb-4">Demande envoyée avec succès !</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">Merci pour votre confiance. Notre équipe étudie votre demande et vous contactera dans les plus brefs délais avec une proposition adaptée.</p>
            <a href="{{ route('home') }}" class="inline-block bg-primary-600 text-white font-bold py-3 px-8 rounded-full hover:bg-primary-500 transition-colors">Retour à l'accueil</a>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Progress Bar -->
            <div class="bg-gray-50 border-b border-gray-100 p-4 sm:p-6">
                <div class="mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">Étape {{ $step }} sur 6</span>
                        <span class="text-sm font-medium text-gray-500">{{ round(($step / 6) * 100) }}% complété</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-primary-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ ($step / 6) * 100 }}%"></div>
                </div>
            </div>

            <!-- Form Wizard -->
            <div class="p-6 sm:p-10">

                <!-- STEP 1: Nature du projet -->
                <div class="{{ $step == 1 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">1. Quelle est la nature de votre projet ?</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Type de projet <span class="text-red-500">*</span></label>
                            <select wire:model.live="project_type" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                <option value="">-- Sélectionnez une option --</option>
                                <option value="Implémentation Odoo">Implémentation Odoo (ERP)</option>
                                <option value="App mobile Flutter">Développement App mobile (Flutter)</option>
                                <option value="Site ou App web">Création de Site / App web</option>
                                <option value="Migration-Mise à jour">Migration ou Mise à jour de système</option>
                                <option value="Formation">Formation d'équipe</option>
                                <option value="Sécurité & audit">Audit / Cybersécurité</option>
                                <option value="Installation réseau">Installation réseau / infrastructure</option>
                                <option value="Autre">Autre projet</option>
                            </select>
                            @error('project_type') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        @if($project_type === 'Autre')
                            <div class="animate-fade-in-up">
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Veuillez préciser <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="project_type_other" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Spécifiez la nature du projet...">
                                @error('project_type_other') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        @endif
                    </div>
                </div>

                <!-- STEP 2: Timeline -->
                <div class="{{ $step == 2 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">2. Quel est le délai souhaité ?</h3>
                    
                    <div class="space-y-8">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-4">Échéance souhaitée <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach(['Urgent (< 1 mois)', '1 à 2 mois', '3 à 6 mois', 'Long terme'] as $timeline)
                                <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 {{ $timeline_urgency == $timeline ? 'border-primary-600 ring-2 ring-primary-600' : 'border-gray-300' }}">
                                    <input type="radio" wire:model.live="timeline_urgency" value="{{ $timeline }}" class="sr-only">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                            <span class="block text-sm font-medium text-gray-900">{{ $timeline }}</span>
                                        </span>
                                    </span>
                                    <svg class="h-5 w-5 text-primary-600 {{ $timeline_urgency == $timeline ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                @endforeach
                            </div>
                            @error('timeline_urgency') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Date de démarrage indicative (optionnel)</label>
                            <input type="text" wire:model="start_date" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Ex: Début mai, fin d'année, après aménagement...">
                            @error('start_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input type="checkbox" wire:model="is_date_fixed" id="is_date_fixed" class="h-5 w-5 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="is_date_fixed" class="font-medium text-gray-900">Le respect strict de ces dates est-il une condition imposée (date fixe) ?</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Budget interactif -->
                <div class="{{ $step == 3 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">3. Quel est le budget estimé pour ce projet ?</h3>
                    
                    <div class="space-y-10" x-data="{ 
                        budgetIndex: 0,
                        ranges: [
                            '1. Moins de 500 000 FCFA',
                            '2. De 500 000 à 1 000 000 FCFA',
                            '3. De 1 000 000 à 2 000 000 FCFA',
                            '4. De 2 000 000 à 3 000 000 FCFA',
                            '5. De 3 000 000 à 5 000 000 FCFA',
                            '6. De 5 000 000 à 10 000 000 FCFA',
                            '7. Plus de 10 000 000 FCFA',
                            '8. À définir (Audit requis)'
                        ]
                    }" x-init="$watch('budgetIndex', value => $wire.set('budget_range', ranges[value]))">
                        
                        <div class="text-center pt-8 pb-4">
                            <p class="text-sm font-medium text-gray-500 mb-2 uppercase tracking-wide">Plage sélectionnée</p>
                            <p class="text-3xl sm:text-4xl font-bold text-primary-600" x-text="ranges[budgetIndex]"></p>
                        </div>

                        <div class="relative pb-8">
                            <input type="range" min="0" max="7" step="1" x-model="budgetIndex" class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary-600">
                            <div class="flex justify-between text-xs font-medium text-gray-400 mt-4 px-2">
                                <span>< 500k</span>
                                <span>À définir</span>
                            </div>
                            
                            <!-- Initialisation caché pour Livewire validation -->
                            <input type="hidden" wire:model="budget_range">
                            @error('budget_range') <p class="mt-2 text-sm text-red-600 text-center">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-6 border-t border-gray-100">
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-4">Mode de financement (optionnel)</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach(['Fonds propres', 'Subvention / Appui institutionnel', 'Crédit bancaire', 'Non encore défini'] as $funding)
                                <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 {{ $funding_mode == $funding ? 'border-primary-600 ring-2 ring-primary-600' : 'border-gray-300' }}">
                                    <input type="radio" wire:model.live="funding_mode" value="{{ $funding }}" class="sr-only">
                                    <span class="block text-sm font-medium text-gray-900">{{ $funding }}</span>
                                    <svg class="absolute right-4 top-4 h-5 w-5 text-primary-600 {{ $funding_mode == $funding ? 'block' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Contexte de l'entreprise -->
                <div class="{{ $step == 4 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">4. Parlez-nous de votre entreprise</h3>
                    
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Secteur d'activité <span class="text-red-500">*</span></label>
                            <select wire:model="industry" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                <option value="">-- Sélectionner --</option>
                                <option value="Commerce général / Détail">Commerce général / Détail</option>
                                <option value="Supermarché">Supermarché</option>
                                <option value="Pharmacie">Pharmacie</option>
                                <option value="BTP / Construction">BTP / Construction</option>
                                <option value="Industrie / Production">Industrie / Production</option>
                                <option value="Agro-alimentaire">Agro-alimentaire</option>
                                <option value="Logistique / Transport">Logistique / Transport</option>
                                <option value="Immobilier">Immobilier</option>
                                <option value="Hôtellerie / Restauration">Hôtellerie / Restauration</option>
                                <option value="Clinique / Santé">Clinique / Santé</option>
                                <option value="École / Éducation">École / Éducation</option>
                                <option value="ONG / Association">ONG / Association</option>
                                <option value="Services IT / Tech">Services IT / Tech</option>
                                <option value="Autre">Autre</option>
                            </select>
                            @error('industry') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Taille de l'entreprise <span class="text-red-500">*</span></label>
                            <select wire:model="company_size" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                <option value="">-- Sélectionner --</option>
                                <option value="Micro / Indépendant (1-5 emp.)">Micro / Indépendant (1-5 emp.)</option>
                                <option value="TPE (6-20 emp.)">TPE (6-20 emp.)</option>
                                <option value="PME (21-100 emp.)">PME (21-100 emp.)</option>
                                <option value="Grande (+100 emp.)">Grande (+100 emp.)</option>
                            </select>
                            @error('company_size') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Pays <span class="text-red-500">*</span></label>
                            <select wire:model="country" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                <option value="Cameroun">Cameroun</option>
                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                <option value="Sénégal">Sénégal</option>
                                <option value="RDC">RDC</option>
                                <option value="Gabon">Gabon</option>
                                <option value="France">France</option>
                                <option value="Canada">Canada</option>
                                <option value="Autre">Autre pays</option>
                            </select>
                            @error('country') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Ville <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="city" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Ex: Douala">
                            @error('city') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2 mt-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-4">Système informatique existant <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                @foreach([
                                    'Aucun (Tout papier)',
                                    'Basique (Excel, Word)',
                                    'Complet (Logiciel à migrer)'
                                ] as $sys)
                                <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:bg-gray-50 {{ $existing_system == $sys ? 'border-primary-600 ring-2 ring-primary-600' : 'border-gray-300' }}">
                                    <input type="radio" wire:model.live="existing_system" value="{{ $sys }}" class="sr-only">
                                    <span class="block text-sm font-medium text-gray-900 text-center w-full">{{ $sys }}</span>
                                </label>
                                @endforeach
                            </div>
                            @error('existing_system') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nombre d'utilisateurs prévus (optionnel)</label>
                            <select wire:model="users_count" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                <option value="">-- Sélectionner --</option>
                                <option value="1 à 5 utilisateurs">1 à 5 utilisateurs</option>
                                <option value="6 à 20 utilisateurs">6 à 20 utilisateurs</option>
                                <option value="21 à 50 utilisateurs">21 à 50 utilisateurs</option>
                                <option value="Plus de 50 utilisateurs">Plus de 50 utilisateurs</option>
                            </select>
                            @error('users_count') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Description Détaillée -->
                <div class="{{ $step == 5 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">5. Description du besoin</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Décrivez votre projet <span class="text-red-500">*</span></label>
                            <textarea wire:model="description" rows="5" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Quels sont vos processus actuels ? Quels problèmes rencontrez-vous ? Quel est le résultat idéal attendu ?"></textarea>
                            @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Fonctionnalités prioritaires (optionnel)</label>
                            <textarea wire:model="priority_features" rows="3" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Ex: Gestion de stock multi-dépôts, point de vente hors-ligne, intégration mobile money..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Références similaires (optionnel)</label>
                                <textarea wire:model="references" rows="3" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Liens ou noms d'applications/sites que vous aimez..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Contraintes techniques (optionnel)</label>
                                <textarea wire:model="technical_constraints" rows="3" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Basse connexion, besoin de serveurs locaux, intégration avec logiciel tiers..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: Coordonnées & Engagement -->
                <div class="{{ $step == 6 ? 'block' : 'hidden' }}">
                    <h3 class="text-2xl font-display font-bold text-gray-900 mb-6">6. Vos informations de contact</h3>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nom complet <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="contact_name" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                @error('contact_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nom de l'entreprise (optionnel)</label>
                                <input type="text" wire:model="company_name" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Fonction / Poste (optionnel)</label>
                                <input type="text" wire:model="job_title" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="Ex: Directeur Général, Responsable IT...">
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Adresse Email <span class="text-red-500">*</span></label>
                                <input type="email" wire:model="email" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6">
                                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Téléphone / WhatsApp <span class="text-red-500">*</span></label>
                                <input type="text" wire:model="phone" class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-lg sm:leading-6" placeholder="+237 6...">
                                @error('phone') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <div class="relative flex items-start p-4 border border-blue-100 bg-blue-50 rounded-lg">
                                <div class="flex h-6 items-center">
                                    <input type="checkbox" wire:model="serious_commitment" id="serious_commitment" class="h-6 w-6 rounded border-gray-300 text-primary-600 focus:ring-primary-600">
                                </div>
                                <div class="ml-4 text-sm leading-6">
                                    <label for="serious_commitment" class="font-bold text-gray-900 text-lg block mb-1">Engagement d'étude <span class="text-red-500">*</span></label>
                                    <p class="text-gray-700">Je confirme être en démarche sérieuse pour ce projet et m'engage à accuser réception ou répondre sous 48h lorsque Zygnixis m'enverra la proposition chiffrée (devis).</p>
                                    @error('serious_commitment') <p class="mt-2 font-bold text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-between">
                    <div>
                        @if($step > 1)
                            <button type="button" wire:click="previousStep" class="inline-flex justify-center rounded-md bg-white px-5 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                                Précédent
                            </button>
                        @endif
                    </div>
                    
                    <div>
                        <div wire:loading wire:target="nextStep, submit" class="mr-4">
                            <div class="inline-block h-5 w-5 animate-spin rounded-full border-2 border-solid border-primary-600 border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status"></div>
                        </div>
                        
                        @if($step < 6)
                            <button type="button" wire:click="nextStep" class="inline-flex justify-center rounded-md bg-gray-900 px-8 py-3 text-sm font-bold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                                Continuer <span aria-hidden="true" class="ml-2">→</span>
                            </button>
                        @else
                            <button type="button" wire:click="submit" class="inline-flex justify-center flex-row items-center rounded-md bg-primary-600 px-8 py-3 text-sm font-bold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                                Soumettre la demande
                                <svg class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.125A59.769 59.769 0 0121.485 12 59.768 59.768 0 013.27 20.875L5.999 12zm0 0h7.5" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    @endif
</div>
