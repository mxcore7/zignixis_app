#!/bin/bash

# ==============================================================================
# Script de mise à jour rapide pour Zygnixis
# ==============================================================================

echo "🔄 Lancement de la mise à jour..."

# 1. On récupère le nouveau code depuis Github
echo "📥 Récupération du nouveau code (git pull)..."
git pull origin main

# 2. On installe de potentiels nouveaux paquets (Si le composer.json a changé)
echo "📦 Vérification des paquets Composer..."
composer install --optimize-autoloader --no-dev

# 3. Sécurité : on remet les droits au cas où Git ait écrasé les permissions
echo "🔐 Vérification des permissions Nginx..."
sudo chown -R www-data:www-data storage bootstrap/cache

# 4. Nettoyage du cache (Très important pour que le site prenne en compte la mise à jour PHP)
echo "🧹 Nettoyage du cache Laravel..."
php artisan optimize:clear

echo "✅ Mise à jour terminée 🚀 ! Votre site est à jour."
