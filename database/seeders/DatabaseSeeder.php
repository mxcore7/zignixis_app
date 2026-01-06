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
            'featured_image' => 'projects/industry.png',
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
            'featured_image' => 'projects/security.png',
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
            'featured_image' => 'projects/logistics.png',
            'published_at' => now()->subMonths(2),
        ]);

        // Blog Posts - Enriched Content
        $cats = \App\Models\Category::all();
        
        // Odoo ERP Category Articles
        \App\Models\Post::create([
            'title' => ['fr' => 'Pourquoi migrer vers Odoo 17 ?', 'en' => 'Why migrate to Odoo 17?'],
            'slug' => 'pourquoi-migrer-vers-odoo-17',
            'excerpt' => ['fr' => 'Découvrez les nouvelles fonctionnalités révolutionnaires de la dernière version d\'Odoo et comment elles peuvent transformer votre entreprise.', 'en' => 'Discover the revolutionary new features of the latest Odoo version and how they can transform your business.'],
            'content' => ['fr' => '<p>Odoo 17 apporte une interface repensée et des performances accrues. Parmi les nouveautés majeures : un nouveau design Material Design, l\'amélioration du module comptable avec la gestion multi-devises avancée, et l\'intégration native avec les principales plateformes de paiement africaines.</p><p>Les entreprises camerounaises bénéficient particulièrement de ces améliorations grâce à une meilleure adaptation aux spécificités locales, notamment la gestion de la TVA et les rapports OHADA.</p>', 'en' => '<p>Odoo 17 brings a redesigned interface and increased performance. Major new features include: a new Material Design, improved accounting module with advanced multi-currency management, and native integration with major African payment platforms.</p>'],
            'category_id' => $cats->firstWhere('slug', 'odoo-erp')->id,
            'author_id' => $admin->id,
            'published_at' => now(),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Comment choisir les modules Odoo adaptés à votre entreprise', 'en' => 'How to choose the right Odoo modules for your business'],
            'slug' => 'choisir-modules-odoo',
            'excerpt' => ['fr' => 'Guide complet pour sélectionner les modules Odoo qui correspondent réellement aux besoins de votre organisation.', 'en' => 'Complete guide to selecting Odoo modules that truly match your organization\'s needs.'],
            'content' => ['fr' => '<p>Le choix des modules Odoo est crucial pour la réussite de votre projet ERP. Commencez par les modules de base : Ventes, CRM, Comptabilité. Pour les industries, ajoutez Fabrication et Inventaire. Les services bénéficient particulièrement de Projet et Feuilles de temps.</p><p>Évitez l\'erreur classique de vouloir tout activer d\'un coup. Une approche progressive permet une meilleure adoption par vos équipes.</p>', 'en' => '<p>Choosing Odoo modules is crucial for your ERP project success. Start with core modules: Sales, CRM, Accounting. For manufacturing, add Manufacturing and Inventory. Services particularly benefit from Project and Timesheets.</p>'],
            'category_id' => $cats->firstWhere('slug', 'odoo-erp')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(3),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Odoo vs SAP vs Sage : Comparatif pour PME africaines', 'en' => 'Odoo vs SAP vs Sage: Comparison for African SMEs'],
            'slug' => 'odoo-vs-sap-vs-sage',
            'excerpt' => ['fr' => 'Analyse comparative des 3 principales solutions ERP pour les entreprises africaines en croissance.', 'en' => 'Comparative analysis of the 3 main ERP solutions for growing African businesses.'],
            'content' => ['fr' => '<p>Pour les PME africaines, Odoo se distingue par son excellent rapport qualité-prix et sa flexibilité. Contrairement à SAP (coût élevé, complexité) et Sage (fonctionnalités limitées), Odoo offre une solution complète et évolutive.</p><p>Le coût moyen d\'implémentation d\'Odoo est 5 fois inférieur à SAP, avec une mise en place 3 fois plus rapide. La communauté active garantit un support réactif et des mises à jour régulières.</p>', 'en' => '<p>For African SMEs, Odoo stands out for its excellent value and flexibility. Unlike SAP (high cost, complexity) and Sage (limited features), Odoo offers a complete and scalable solution.</p>'],
            'category_id' => $cats->firstWhere('slug', 'odoo-erp')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(7),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Intégration Odoo avec Mobile Money : Guide pratique', 'en' => 'Odoo integration with Mobile Money: Practical guide'],
            'slug' => 'integration-odoo-mobile-money',
            'excerpt' => ['fr' => 'Connectez votre ERP Odoo aux plateformes de paiement mobile les plus populaires en Afrique.', 'en' => 'Connect your Odoo ERP to the most popular mobile payment platforms in Africa.'],
            'content' => ['fr' => '<p>L\'intégration d\'Odoo avec Orange Money, MTN Mobile Money et Moov Money est désormais simplifiée grâce aux modules développés spécifiquement pour l\'Afrique francophone.</p><p>Les avantages sont multiples : réconciliation automatique des paiements, suivi en temps réel des transactions, et génération automatique des factures. Une solution indispensable pour toute entreprise souhaitant faciliter les paiements de ses clients.</p>', 'en' => '<p>Odoo integration with Orange Money, MTN Mobile Money and Moov Money is now simplified thanks to modules specifically developed for Francophone Africa.</p>'],
            'category_id' => $cats->firstWhere('slug', 'odoo-erp')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(10),
        ]);

        // Digital Transformation Category
        \App\Models\Post::create([
            'title' => ['fr' => 'Les 5 étapes d\'une transformation digitale réussie', 'en' => '5 steps to successful digital transformation'],
            'slug' => '5-etapes-transformation-digitale',
            'excerpt' => ['fr' => 'Méthodologie éprouvée pour digitaliser votre entreprise sans perdre vos équipes en route.', 'en' => 'Proven methodology to digitize your business without losing your teams along the way.'],
            'content' => ['fr' => '<p>1. Audit de l\'existant : Cartographiez vos processus actuels. 2. Définition de la vision : Où voulez-vous être dans 3 ans ? 3. Choix des outils : Priorisez les solutions adaptées à votre contexte. 4. Formation intensive : 80% du succès vient de l\'adoption utilisateur. 5. Amélioration continue : La transformation n\'est jamais finie.</p><p>Chez Zygnixis, nous accompagnons nos clients sur ces 5 étapes avec une approche personnalisée adaptée au marché camerounais.</p>', 'en' => '<p>1. Current state audit: Map your current processes. 2. Vision definition: Where do you want to be in 3 years? 3. Tool selection: Prioritize solutions adapted to your context. 4. Intensive training: 80% of success comes from user adoption. 5. Continuous improvement: Transformation is never finished.</p>'],
            'category_id' => $cats->firstWhere('slug', 'digital-transformation')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(2),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Cloud ou On-Premise : Quel hébergement pour votre ERP ?', 'en' => 'Cloud or On-Premise: Which hosting for your ERP?'],
            'slug' => 'cloud-vs-on-premise-erp',
            'excerpt' => ['fr' => 'Analyse des avantages et inconvénients de chaque option pour les entreprises africaines.', 'en' => 'Analysis of the pros and cons of each option for African businesses.'],
            'content' => ['fr' => '<p>Le Cloud offre flexibilité et coûts prévisibles, idéal pour les PME en croissance. L\'On-Premise garantit contrôle total et conformité, adapté aux grandes structures avec équipes IT.</p><p>Au Cameroun, nous recommandons souvent une approche hybride : données sensibles en local, applications métier dans le cloud. Cette configuration optimise sécurité et performance tout en maîtrisant les coûts.</p>', 'en' => '<p>Cloud offers flexibility and predictable costs, ideal for growing SMEs. On-Premise guarantees total control and compliance, suitable for large structures with IT teams.</p>'],
            'category_id' => $cats->firstWhere('slug', 'digital-transformation')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(14),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Automatisation des processus : ROI et cas d\'usage', 'en' => 'Process automation: ROI and use cases'],
            'slug' => 'automatisation-processus-roi',
            'excerpt' => ['fr' => 'Découvrez comment l\'automatisation peut réduire vos coûts opérationnels de 40%.', 'en' => 'Discover how automation can reduce your operating costs by 40%.'],
            'content' => ['fr' => '<p>L\'automatisation des tâches répétitives libère vos équipes pour des activités à plus forte valeur ajoutée. Exemples concrets : facturation automatique (gain de 15h/mois), relances clients programmées, génération de rapports.</p><p>Le retour sur investissement typique : 6-12 mois pour des gains mesurables. Un de nos clients a réduit son temps de clôture comptable de 15 à 3 jours grâce à l\'automatisation Odoo.</p>', 'en' => '<p>Automating repetitive tasks frees your teams for higher value-added activities. Concrete examples: automatic invoicing (saving 15h/month), scheduled customer reminders, report generation.</p>'],
            'category_id' => $cats->firstWhere('slug', 'digital-transformation')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(18),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Gestion documentaire électronique : adieu au papier', 'en' => 'Electronic document management: goodbye to paper'],
            'slug' => 'ged-gestion-electronique-documents',
            'excerpt' => ['fr' => 'Comment mettre en place une GED efficace et dire adieu aux classeurs qui débordent.', 'en' => 'How to implement an effective EDM and say goodbye to overflowing binders.'],
            'content' => ['fr' => '<p>La Gestion Électronique de Documents (GED) transforme radicalement l\'organisation. Avec Odoo Documents, centralisez factures, contrats, RH dans un espace sécurisé et accessible 24/7.</p><p>Bénéfices immédiats : recherche instantanée, partage sécurisé, workflows d\'approbation automatiques, et sauvegarde transparente. Une PME moyenne économise 50 000 FCFA/mois en frais d\'impression et archivage.</p>', 'en' => '<p>Electronic Document Management (EDM) radically transforms organization. With Odoo Documents, centralize invoices, contracts, HR in a secure space accessible 24/7.</p>'],
            'category_id' => $cats->firstWhere('slug', 'digital-transformation')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(21),
        ]);

        // Security Category
        \App\Models\Post::create([
            'title' => ['fr' => 'L\'importance de la cybersécurité en 2025', 'en' => 'The Importance of Cybersecurity in 2025'],
            'slug' => 'importance-cybersecurite-2025',
            'excerpt' => ['fr' => 'Les menaces évoluent, vos protections aussi. Voici ce qu\'il faut savoir pour protéger votre entreprise.', 'en' => 'Threats evolve, so should your protections. Here is what you need to know to protect your business.'],
            'content' => ['fr' => '<p>La transformation digitale expose les entreprises à de nouveaux risques : ransomwares, phishing, fuites de données. En 2025, 43% des cyberattaques ciblent les PME africaines, souvent moins protégées que les grandes entreprises.</p><p>Les fondamentaux : authentification à deux facteurs, sauvegardes automatiques quotidiennes, formation continue des équipes, et firewall de nouvelle génération. Un audit de sécurité annuel est désormais indispensable.</p>', 'en' => '<p>Digital transformation exposes companies to new risks: ransomware, phishing, data breaches. In 2025, 43% of cyberattacks target African SMEs, often less protected than large companies.</p>'],
            'category_id' => $cats->firstWhere('slug', 'security')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(5),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Vidéosurveillance IP vs Analogique : Guide 2025', 'en' => 'IP vs Analog CCTV: 2025 Guide'],
            'slug' => 'videosurveillance-ip-vs-analogique',
            'excerpt' => ['fr' => 'Comparatif détaillé pour choisir le système de vidéosurveillance adapté à votre entreprise.', 'en' => 'Detailed comparison to choose the right CCTV system for your business.'],
            'content' => ['fr' => '<p>Les caméras IP offrent une qualité d\'image supérieure (jusqu\'à 4K), analyse vidéo intelligente (détection d\'intrusion, comptage de personnes), et flexibilité de déploiement. L\'analogique reste pertinent pour les petits budgets ou extensions de systèmes existants.</p><p>Notre recommandation : IP pour les nouvelles installations, avec stockage NVR local + cloud backup. Budget type : 1,5M FCFA pour 8 caméras 2MP avec installation.</p>', 'en' => '<p>IP cameras offer superior image quality (up to 4K), intelligent video analysis (intrusion detection, people counting), and deployment flexibility. Analog remains relevant for small budgets or existing system extensions.</p>'],
            'category_id' => $cats->firstWhere('slug', 'security')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(12),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Contrôle d\'accès biométrique : technologies et ROI', 'en' => 'Biometric access control: technologies and ROI'],
            'slug' => 'controle-acces-biometrique',
            'excerpt' => ['fr' => 'Empreintes digitales, reconnaissance faciale ou iris : quelle technologie choisir ?', 'en' => 'Fingerprints, facial recognition or iris: which technology to choose?'],
            'content' => ['fr' => '<p>La biométrie révolutionne le contrôle d\'accès en éliminant badges perdus et codes oubliés. Empreintes digitales : fiable et abordable. Reconnaissance faciale : sans contact, idéal post-COVID. Iris : ultra-sécurisé pour zones sensibles.</p><p>ROI typique : élimination des badges (200 000 FCFA/an), réduction des intrusions (95%), et traçabilité parfaite pour audits. Intégration native avec Odoo pour gestion RH et pointage.</p>', 'en' => '<p>Biometrics revolutionizes access control by eliminating lost badges and forgotten codes. Fingerprints: reliable and affordable. Facial recognition: contactless, ideal post-COVID. Iris: ultra-secure for sensitive areas.</p>'],
            'category_id' => $cats->firstWhere('slug', 'security')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(16),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'RGPD et protection des données au Cameroun', 'en' => 'GDPR and data protection in Cameroon'],
            'slug' => 'rgpd-protection-donnees-cameroun',
            'excerpt' => ['fr' => 'Ce que les entreprises camerounaises doivent savoir sur la réglementation des données personnelles.', 'en' => 'What Cameroonian companies need to know about personal data regulations.'],
            'content' => ['fr' => '<p>Bien que le RGPD soit européen, le Cameroun a adopté des lois similaires. Toute entreprise traitant des données personnelles doit : obtenir le consentement explicite, garantir la sécurité des données, permettre l\'accès et la suppression sur demande.</p><p>Odoo intègre nativement des fonctionnalités de conformité : anonymisation des données, export RGPD, et logs d\'accès. Un audit de mise en conformité prend généralement 2-3 semaines.</p>', 'en' => '<p>Although GDPR is European, Cameroon has adopted similar laws. Any company processing personal data must: obtain explicit consent, ensure data security, allow access and deletion on request.</p>'],
            'category_id' => $cats->firstWhere('slug', 'security')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(20),
        ]);

        // News Category
        \App\Models\Post::create([
            'title' => ['fr' => 'Zygnixis certifié Partenaire Officiel Odoo 2025', 'en' => 'Zygnixis certified Official Odoo Partner 2025'],
            'slug' => 'zygnixis-partenaire-odoo-2025',
            'excerpt' => ['fr' => 'Nous sommes fiers d\'annoncer notre certification en tant que partenaire officiel Odoo pour l\'Afrique Centrale.', 'en' => 'We are proud to announce our certification as an official Odoo partner for Central Africa.'],
            'content' => ['fr' => '<p>Cette certification témoigne de notre expertise technique et de notre engagement envers nos clients. En tant que partenaire officiel, nous bénéficions d\'un accès prioritaire au support Odoo, des formations avancées, et participons au programme de développement.</p><p>Concrètement pour nos clients : garantie de qualité, mises à jour prioritaires, et tarifs préférentiels sur les licences Enterprise. Nous sommes un des 5 partenaires certifiés au Cameroun.</p>', 'en' => '<p>This certification demonstrates our technical expertise and commitment to our clients. As an official partner, we benefit from priority access to Odoo support, advanced training, and participate in the development program.</p>'],
            'category_id' => $cats->firstWhere('slug', 'news')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(1),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Nouveau showroom Zygnixis à Bonanjo', 'en' => 'New Zygnixis showroom in Bonanjo'],
            'slug' => 'nouveau-showroom-bonanjo',
            'excerpt' => ['fr' => 'Venez découvrir nos solutions dans notre nouvel espace de démonstration au cœur de Douala.', 'en' => 'Come discover our solutions in our new demonstration space in the heart of Douala.'],
            'content' => ['fr' => '<p>Notre nouveau showroom de 150m² vous accueille du lundi au vendredi pour des démonstrations personnalisées d\'Odoo, visites de nos installations de sécurité, et ateliers de formation.</p><p>Espace dédié avec : 6 postes de démonstration Odoo, salle de formation pour 12 personnes, exposition de matériel de vidéosurveillance et contrôle d\'accès. Réservez votre créneau dès maintenant !</p>', 'en' => '<p>Our new 150m² showroom welcomes you Monday to Friday for personalized Odoo demonstrations, security installation tours, and training workshops.</p>'],
            'category_id' => $cats->firstWhere('slug', 'news')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(8),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Webinaire gratuit : "Démarrer avec Odoo"', 'en' => 'Free webinar: "Getting started with Odoo"'],
            'slug' => 'webinaire-demarrer-odoo',
            'excerpt' => ['fr' => 'Participez à notre webinaire mensuel pour découvrir Odoo en 90 minutes chrono.', 'en' => 'Join our monthly webinar to discover Odoo in 90 minutes flat.'],
            'content' => ['fr' => '<p>Chaque dernier jeudi du mois, notre équipe anime un webinaire gratuit de découverte d\'Odoo. Au programme : présentation générale, démonstration des modules clés, session Q&R, et offre spéciale pour les participants.</p><p>Format interactif avec démonstration live et possibilité de poser vos questions. Inscription obligatoire, places limitées à 50 participants. Prochain webinaire : 30 janvier 2025 à 14h GMT+1.</p>', 'en' => '<p>Every last Thursday of the month, our team hosts a free Odoo discovery webinar. Program: general presentation, key modules demonstration, Q&A session, and special offer for participants.</p>'],
            'category_id' => $cats->firstWhere('slug', 'news')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(4),
        ]);

        \App\Models\Post::create([
            'title' => ['fr' => 'Zygnixis recrute : 3 postes de consultants Odoo', 'en' => 'Zygnixis is hiring: 3 Odoo consultant positions'],
            'slug' => 'zygnixis-recrute-consultants-odoo',
            'excerpt' => ['fr' => 'Rejoignez une équipe passionnée et participez à la transformation digitale des entreprises camerounaises.', 'en' => 'Join a passionate team and participate in the digital transformation of Cameroonian companies.'],
            'content' => ['fr' => '<p>Nous recherchons 3 consultants Odoo (Junior, Confirmé, Senior) pour accompagner notre croissance. Profil recherché : formation informatique/gestion, passion pour les ERP, excellent relationnel.</p><p>Ce que nous offrons : formation Odoo certifiée, projets variés (industrie, services, retail), évolution rapide, et package attractif. Expérience Odoo appréciée mais débutants motivés bienvenus. Candidatures à envoyer avant le 15 février.</p>', 'en' => '<p>We are looking for 3 Odoo consultants (Junior, Confirmed, Senior) to support our growth. Desired profile: IT/management training, passion for ERPs, excellent interpersonal skills.</p>'],
            'category_id' => $cats->firstWhere('slug', 'news')->id,
            'author_id' => $admin->id,
            'published_at' => now()->subDays(6),
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
