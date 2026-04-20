#!/bin/bash

# ==============================================================================
# Script de déploiement automatique pour VPS Ubuntu/Debian
# ==============================================================================

echo "🚀 Début du déploiement..."
echo "Ce script va installer PHP, MySQL, Nginx, Composer et configurer Laravel."
echo ""

# 1. Mise à jour du système
echo "📦 Mise à jour du système..."
sudo apt update && sudo apt upgrade -y

# 2. Installation des dépendances systèmes et PHP 8.4
echo "🛠️ Ajout du dépôt PHP et installation de Nginx, MySQL, Git, Unzip et PHP 8.4..."
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y nginx mysql-server git curl unzip zip \
    php8.4-cli php8.4-fpm php8.4-mysql php8.4-xml php8.4-mbstring php8.4-curl php8.4-zip php8.4-bcmath php8.4-json

# 3. Installation de Composer (si non installé)
if ! command -v composer &> /dev/null
then
    echo "🎵 Installation de Composer..."
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
fi

# 4. Configuration de MySQL et Base de Données
DB_NAME="zygnixis_laravel"
DB_USER="zygnixis_user"
DB_PASS="ZygnixisSecurePwd2026*"

echo "🗄️ Création de la base de données '$DB_NAME'..."
# On crée la DB si elle n'existe pas
sudo mysql -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

echo "👤 Création de l'utilisateur dédié '$DB_USER' pour plus de sécurité..."
sudo mysql -e "CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
sudo mysql -e "ALTER USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
sudo mysql -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Importation du fichier SQL s'il est présent
if [ -f "zygnixis_laravel.sql" ]; then
    echo "📥 Importation de zygnixis_laravel.sql..."
    sudo mysql $DB_NAME < zygnixis_laravel.sql
    echo "✅ Données importées !"
else
    echo "⚠️ Aucun fichier zygnixis_laravel.sql trouvé dans le dossier actuel."
fi

# 5. Dépendances Laravel
echo "⚙️ Installation des dépendances Laravel via Composer..."
composer install --optimize-autoloader --no-dev

# 6. Configuration de l'environnement (.env)
if [ ! -f ".env" ]; then
    echo "📄 Création du fichier .env..."
    cp .env.example .env
    php artisan key:generate
    echo "N'oubliez pas d'ouvrir le fichier .env pour régler APP_ENV=production et APP_DEBUG=false"
fi

# 7. Permissions importantes pour Laravel
echo "🔐 Configuration des permissions pour storage/ et bootstrap/cache/..."
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo ""
echo "🎉 Déploiement terminé avec succès !"
echo ""
echo "PROCHAINES ÉTAPES :"
echo "1. Configurez Nginx (dans /etc/nginx/sites-available/) pour pointer vers le dossier 'public' de ce projet."
echo "2. Vérifiez que votre fichier '.env' a les bons accès à la base de données."
