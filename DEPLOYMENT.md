# Guide de Déploiement - Zygnixis

## Configuration Initiale du Serveur

### 1. Lien Symbolique pour le Stockage

Après avoir déployé l'application sur le serveur, vous **devez** créer le lien symbolique pour rendre les fichiers uploadés accessibles publiquement :

```bash
php artisan storage:link
```

Cette commande crée un lien symbolique de `public/storage` vers `storage/app/public`.

### 2. Permissions des Dossiers

Définir les permissions correctes pour que le serveur web puisse écrire dans les dossiers nécessaires :

```bash
# Donner les permissions d'écriture
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Définir le propriétaire (remplacer www-data par votre utilisateur web si différent)
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### 3. Vérification

Vérifier que le lien symbolique a été créé correctement :

```bash
ls -la public/storage
# Devrait afficher : public/storage -> ../../storage/app/public
```

## Migration des Médias Existants

Si vous avez des médias en local que vous souhaitez transférer sur le serveur de production :

### Option 1 : Via SFTP/SCP

```bash
# Depuis votre machine locale
scp -r storage/app/public/media/* user@server:/path/to/app/storage/app/public/media/
```

### Option 2 : Via rsync

```bash
# Depuis votre machine locale
rsync -avz storage/app/public/media/ user@server:/path/to/app/storage/app/public/media/
```

### Option 3 : Réuploader via l'Interface Admin

Vous pouvez également réuploader les médias directement via l'interface d'administration de l'application.

## Vérification Post-Déploiement

1. **Tester l'upload d'un média** :
   - Connectez-vous à l'interface admin
   - Allez dans la bibliothèque de médias
   - Uploadez une nouvelle image

2. **Vérifier l'affichage** :
   - L'image doit s'afficher correctement dans la bibliothèque
   - L'URL doit être au format : `https://votredomaine.com/storage/media/filename.jpg`

3. **Tester la suppression** :
   - Supprimez un média de test
   - Vérifiez que le fichier physique a bien été supprimé

## Configuration de l'Environnement

Assurez-vous que votre fichier `.env` sur le serveur contient :

```env
FILESYSTEM_DISK=public
APP_URL=https://votredomaine.com
```

## Dépannage

### Les images ne s'affichent pas

1. Vérifiez que le lien symbolique existe :
   ```bash
   ls -la public/storage
   ```

2. Vérifiez les permissions :
   ```bash
   ls -la storage/app/public
   ```

3. Vérifiez les logs Laravel :
   ```bash
   tail -f storage/logs/laravel.log
   ```

### Erreur 404 sur les URLs /storage/*

Le lien symbolique n'existe probablement pas. Exécutez :
```bash
php artisan storage:link
```

### Permission denied lors de l'upload

Les permissions du dossier storage sont incorrectes. Exécutez :
```bash
chmod -R 775 storage
chown -R www-data:www-data storage
```

## Notes Importantes

- ⚠️ **Ne jamais versionner** les fichiers dans `storage/app/public/*` (déjà configuré dans `.gitignore`)
- ⚠️ **Créer le lien symbolique** à chaque nouveau déploiement sur un nouveau serveur
- ⚠️ **Sauvegarder régulièrement** le contenu de `storage/app/public` (non versionné dans Git)
- ✅ Chaque environnement (local, staging, production) a ses propres fichiers uploadés
