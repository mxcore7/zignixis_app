<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin Zygnixis',
            'email' => 'admin@zygnixis.com',
            'password' => bcrypt('password'),
        ]);

        // Categories
        $categories = [
            [
                'name' => ['fr' => 'Odoo ERP', 'en' => 'Odoo ERP'],
                'slug' => 'odoo-erp',
                'description' => ['fr' => 'Tout sur la suite Odoo', 'en' => 'Everything about Odoo suite']
            ],
            [
                'name' => ['fr' => 'Transformation Digitale', 'en' => 'Digital Transformation'],
                'slug' => 'digital-transformation',
                'description' => ['fr' => 'Stratégies digitales', 'en' => 'Digital strategies']
            ],
            [
                'name' => ['fr' => 'Sécurité', 'en' => 'Security'],
                'slug' => 'security',
                'description' => ['fr' => 'Cybersécurité et protection physique', 'en' => 'Cybersecurity and physical protection']
            ],
            [
                'name' => ['fr' => 'Actualités', 'en' => 'News'],
                'slug' => 'news',
                'description' => ['fr' => 'Nouvelles de Zygnixis', 'en' => 'Zygnixis News']
            ],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::create($cat);
        }

        // Services
        $services = [
            [
                'name' => ['fr' => 'Intégration Odoo', 'en' => 'Odoo Integration'],
                'slug' => 'integration-odoo',
                'short_description' => ['fr' => 'Déploiement complet de votre ERP', 'en' => 'Full ERP deployment'],
                'icon' => 'server',
                'order' => 1
            ],
            [
                'name' => ['fr' => 'Sécurité Électronique', 'en' => 'Electronic Security'],
                'slug' => 'security-electronic',
                'short_description' => ['fr' => 'Vidéosurveillance et Contrôle d\'accès', 'en' => 'CCTV and Access Control'],
                'icon' => 'shield-check',
                'order' => 2
            ],
            [
                'name' => ['fr' => 'Développement Web', 'en' => 'Web Development'],
                'slug' => 'web-development',
                'short_description' => ['fr' => 'Applications sur mesure', 'en' => 'Custom applications'],
                'icon' => 'code',
                'order' => 3
            ],
        ];

        foreach ($services as $svc) {
            \App\Models\Service::create($svc);
        }

        // Projects
        \App\Models\Project::create([
            'title' => ['fr' => 'Déploiement ERP Odoo pour Industries S.A.', 'en' => 'Odoo ERP Deployment for Industries S.A.'],
            'slug' => 'deploiement-erp-industries-sa',
            'client_name' => 'Industries S.A.',
            'sector' => 'Industrie',
            'description' => ['fr' => 'Mise en place complète des modules Fabrication, Stock et Ventes pour une usine de transformation.', 'en' => 'Full implementation of Manufacturing, Inventory, and Sales modules for a processing plant.'],
            'solution' => ['fr' => 'Odoo Enterprise v17 avec connecteurs IoT.', 'en' => 'Odoo Enterprise v17 with IoT connectors.'],
            'results' => ['fr' => 'Réduction de 30% des pertes de matières premières.', 'en' => '30% reduction in raw material losses.'],
            'published_at' => now(),
        ]);

        \App\Models\Project::create([
            'title' => ['fr' => 'Sécurisation Siège Banque Atlantique', 'en' => 'Security for Banque Atlantique HQ'],
            'slug' => 'securisation-banque-atlantique',
            'client_name' => 'Banque Atlantique',
            'sector' => 'Finance',
            'description' => ['fr' => 'Installation de 50 caméras IP et système de contrôle d\'accès biométrique.', 'en' => 'Installation of 50 IP cameras and biometric access control system.'],
            'solution' => ['fr' => 'Hikvision AI Cameras + ZKTeco Access Control.', 'en' => 'Hikvision AI Cameras + ZKTeco Access Control.'],
            'results' => ['fr' => 'Couverture 100% du site et traçabilité des accès.', 'en' => '100% site coverage and access traceability.'],
            'published_at' => now()->subMonth(),
        ]);

        \App\Models\Project::create([
            'title' => ['fr' => 'Portail Client Logistique Express', 'en' => 'Logistique Express Client Portal'],
            'slug' => 'portail-logistique-express',
            'client_name' => 'Logistique Express',
            'sector' => 'Transport',
            'description' => ['fr' => 'Développement d\'une application web pour le suivi des colis en temps réel.', 'en' => 'Development of a web application for real-time parcel tracking.'],
            'solution' => ['fr' => 'Laravel + Vue.js', 'en' => 'Laravel + Vue.js'],
            'results' => ['fr' => 'Satisfaction client améliorée de 40%.', 'en' => 'Client satisfaction improved by 40%.'],
            'published_at' => now()->subMonths(2),
        ]);

        // Blog Posts
        $cats = \App\Models\Category::all();
        \App\Models\Post::create([
            'title' => ['fr' => 'Pourquoi migrer vers Odoo 17 ?', 'en' => 'Why migrate to Odoo 17?'],
            'slug' => 'pourquoi-migrer-vers-odoo-17',
            'excerpt' => ['fr' => 'Découvrez les nouvelles fonctionnalités révolutionnaires de la dernière version d\'Odoo.', 'en' => 'Discover the revolutionary new features of the latest Odoo version.'],
            'content' => ['fr' => '<p>Odoo 17 apporte une interface repensée et des performances accrues...</p>', 'en' => '<p>Odoo 17 brings a redesigned interface and increased performance...</p>'],
            'category_id' => $cats->firstWhere('slug', 'odoo-erp')->id,
            'author_id' => $admin->id,
            'published_at' => now(),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'L\'importance de la cybersécurité en 2025', 'en' => 'The Importance of Cybersecurity in 2025'],
            'slug' => 'importance-cybersecurite-2025',
            'excerpt' => ['fr' => 'Les menaces évoluent, vos protections aussi. Voici ce qu\'il faut savoir.', 'en' => 'Threats evolve, so should your protections. Here is what you need to know.'],
            'content' => ['fr' => '<p>La transformation digitale expose les entreprises à de nouveaux risques...</p>', 'en' => '<p>Digital transformation exposes companies to new risks...</p>'],
            'category_id' => $cats->firstWhere('slug', 'security')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(5),
        ]);
        // ... existing posts code ...

        // Partners
        $partners = [
            ['name' => 'Odoo', 'logo' => 'partners/odoo.png', 'website' => 'https://odoo.com'],
            ['name' => 'Hikvision', 'logo' => 'partners/hikvision.png', 'website' => 'https://hikvision.com'],
            ['name' => 'AWS', 'logo' => 'partners/aws.png', 'website' => 'https://aws.amazon.com'],
            ['name' => 'Microsoft', 'logo' => 'partners/microsoft.png', 'website' => 'https://microsoft.com'],
        ];

        foreach ($partners as $partner) {
            \App\Models\Partner::create($partner);
        }

        // Team Members
        $team = [
            [
                'name' => 'Jean Dupont',
                'photo' => 'team/jean.jpg',
                'role' => ['fr' => 'Directeur Général', 'en' => 'CEO'],
                'bio' => ['fr' => 'Expert en transformation digitale avec 15 ans d\'expérience.', 'en' => 'Digital transformation expert with 15 years of experience.'],
                'social_links' => ['linkedin' => 'https://linkedin.com', 'twitter' => 'https://twitter.com']
            ],
            [
                'name' => 'Sophie Martin',
                'photo' => 'team/sophie.jpg',
                'role' => ['fr' => 'Cheffe de Projet Technique', 'en' => 'Technical Project Manager'],
                'bio' => ['fr' => 'Spécialiste Odoo certifiée.', 'en' => 'Certified Odoo Specialist.'],
                'social_links' => ['linkedin' => 'https://linkedin.com']
            ],
            [
                'name' => 'Marc Dubreuil',
                'photo' => 'team/marc.jpg',
                'role' => ['fr' => 'Responsable Sécurité', 'en' => 'Security Manager'],
                'bio' => ['fr' => 'Ingénieur en systèmes de sécurité avancés.', 'en' => 'Advanced security systems engineer.'],
                'social_links' => ['linkedin' => 'https://linkedin.com']
            ],
        ];

        foreach ($team as $member) {
            \App\Models\TeamMember::create($member);
        }

        // Odoo Modules
        $modules = [
            [
                'name' => ['fr' => 'CRM', 'en' => 'CRM'],
                'icon' => 'users',
                'description' => ['fr' => 'Gérez votre pipeline de ventes et vos opportunités efficacement.', 'en' => 'Manage your sales pipeline and opportunities efficiently.'],
                'features' => ['Pipeline visuel', 'Automatisation des leads', 'Rapports précis'],
                'link' => 'https://odoo.com/app/crm'
            ],
            [
                'name' => ['fr' => 'Ventes', 'en' => 'Sales'],
                'icon' => 'shopping-cart',
                'description' => ['fr' => 'De la devis à la facture en quelques clics.', 'en' => 'From quote to invoice in a few clicks.'],
                'features' => ['Outil de devis', 'Signature électronique', 'Paiement en ligne'],
                'link' => 'https://odoo.com/app/sales'
            ],
            [
                'name' => ['fr' => 'Comptabilité', 'en' => 'Accounting'],
                'icon' => 'calculator',
                'description' => ['fr' => 'Une comptabilité analytique et générale intégrée.', 'en' => 'Integrated analytic and general accounting.'],
                'features' => ['Facturation', 'Réconciliation bancaire', 'Rapports dynamiques'],
                'link' => 'https://odoo.com/app/accounting'
            ],
            [
                'name' => ['fr' => 'Inventaire', 'en' => 'Inventory'],
                'icon' => 'archive',
                'description' => ['fr' => 'Optimisez vos stocks et votre logistique.', 'en' => 'Optimize your stock and logistics.'],
                'features' => ['Traçabilité double entrée', 'Dropshipping', 'Multi-entrepôts'],
                'link' => 'https://odoo.com/app/inventory'
            ],
            [
                'name' => ['fr' => 'Fabrication (MRP)', 'en' => 'Manufacturing (MRP)'],
                'icon' => 'cog',
                'description' => ['fr' => 'Planifiez, lancez et suivez vos ordres de production.', 'en' => 'Plan, launch, and track your production orders.'],
                'features' => ['Nomenclatures', 'Ordres de travail', 'PLM'],
                'link' => 'https://odoo.com/app/mrp'
            ],
            [
                'name' => ['fr' => 'Site Web', 'en' => 'Website'],
                'icon' => 'globe',
                'description' => ['fr' => 'Créez un site web professionnel sans coder.', 'en' => 'Create a professional website without coding.'],
                'features' => ['Éditeur glisser-déposer', 'eCommerce intégré', 'SEO Ready'],
                'link' => 'https://odoo.com/app/website'
            ],
        ];

        foreach ($modules as $mod) {
            \App\Models\OdooModule::create($mod);
        }

        // Realizations
        $realizations = [
            [
                'title' => ['fr' => 'Déploiement Odoo ERP Complet', 'en' => 'Complete Odoo ERP Deployment'],
                'description' => ['fr' => 'Mise en place d\'un système ERP Odoo complet pour une entreprise industrielle, incluant les modules de fabrication, inventaire, ventes et comptabilité.', 'en' => 'Implementation of a complete Odoo ERP system for an industrial company, including manufacturing, inventory, sales, and accounting modules.'],
                'image' => 'realizations/erp_deployment.png',
                'details' => ['Client' => 'Industries S.A.', 'Durée' => '6 mois', 'Modules' => '12'],
                'order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($realizations as $realization) {
            \App\Models\Realization::create($realization);
        }

        // Contact Info
        $contactInfos = [
            ['key' => 'email_principal', 'value' => 'contact@zygnixis.com', 'icon' => 'envelope', 'type' => 'email', 'order' => 1],
            ['key' => 'email_support', 'value' => 'support@zygnixis.com', 'icon' => 'envelope', 'type' => 'email', 'order' => 2],
            ['key' => 'phone_principal', 'value' => '+237 6XX XX XX XX', 'icon' => 'phone', 'type' => 'phone', 'order' => 3],
            ['key' => 'phone_secondaire', 'value' => '+237 6XX XX XX XX', 'icon' => 'phone', 'type' => 'phone', 'order' => 4],
            ['key' => 'address', 'value' => ['fr' => 'Akwa, Douala, Cameroun', 'en' => 'Akwa, Douala, Cameroon'], 'icon' => 'map-pin', 'type' => 'address', 'order' => 5],
        ];

        foreach ($contactInfos as $info) {
            \App\Models\ContactInfo::create($info);
        }

        // Grant admin all permissions
        $admin->update([
            'permissions' => ['admin'],
            'is_active' => true,
        ]);


        // Global Settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Zygnixis', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => 'logo.png', 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => 'favicon.ico', 'type' => 'image', 'group' => 'general'],
            
            // Contact
            ['key' => 'contact_email', 'value' => 'contact@zygnixis.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+237 600 000 000', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Douala, Cameroun', 'type' => 'text', 'group' => 'contact'],
            
            // Social
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/zygnixis', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/zygnixis', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/zygnixis', 'type' => 'text', 'group' => 'social'],
            
            // Footer
            ['key' => 'footer_description', 'value' => ['fr' => 'Votre partenaire de confiance pour la transformation numérique et la sécurité.', 'en' => 'Your trusted partner for digital transformation and security.'], 'type' => 'translatable_text', 'group' => 'footer'],
            ['key' => 'footer_copy', 'value' => '© 2024 Zygnixis. All rights reserved.', 'type' => 'text', 'group' => 'footer'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}
