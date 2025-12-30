# 🚀 Guide de Lancement et de Test - Zygnixis

## 1. Démarrer les Serveurs
Vous devez ouvrir **deux terminaux** séparés à la racine du projet (`.../zygnixis-laravel`) :

### Terminal 1 : Backend (Laravel)
```bash
php artisan serve
```
*Cela rendra le site accessible sur `http://127.0.0.1:8000`*

### Terminal 2 : Frontend (Vite)
```bash
npm run dev
```
*Cela compile les fichiers CSS/JS en temps réel.*

---

## 2. Accéder au Site
- **Accueil** : [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Pages** : Naviguez vers "Solutions", "Expertise", "Projets", "Blog", "Contact".

## 3. Accéder à l'Administration
- **Page de Connexion** : [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login)
- **Tableau de Bord** : [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

### 🔑 Identifiants Admin (créés par le seeder)
- **Email** : `admin@zygnixis.com`
- **Mot de passe** : `password`

---

## 4. Scénarios de Test

### A. Tester le Formulaire de Contact
1. Allez sur la page **Contact**.
2. Remplissez le formulaire et envoyez.
3. Connectez-vous à l'**Admin**.
4. Vérifiez que le message apparaît dans le tableau de bord (section "Derniers Messages") ou dans les statistiques.

### B. Tester la Gestion du Blog
1. Connectez-vous à l'**Admin**.
2. Allez dans **Articles de Blog** (barre latérale).
3. **Créer** : Ajoutez un nouvel article avec une image.
4. **Vérifier** : Allez sur la page **Blog** du site public pour voir si l'article apparaît.
5. **Modifier/Supprimer** : Testez ces actions depuis l'admin.

### C. Tester le Filtre de Projets
1. Allez sur la page **Projets**.
2. Cliquez sur les boutons de filtre (ex: "Industrie", "Finance") pour voir la liste se mettre à jour dynamiquement (Livewire).
