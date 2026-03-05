# ResaFit — Instructions d'installation

## 1. Prérequis
- PHP 8.2+
- Composer
- MySQL (ou changer pour SQLite en dev)
- Node.js + npm

## 2. Installation des dépendances

```bash
composer install
npm install && npm run build
```

## 3. Configuration .env

Copier `.env.example` en `.env` et configurer :

```env
APP_NAME=ResaFit
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=fr
APP_FALLBACK_LOCALE=fr
APP_FAKER_LOCALE=fr_FR

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resafit_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=log
MAIL_FROM_ADDRESS=no-reply@resafit.com
MAIL_FROM_NAME="ResaFit"
```

## 4. Générer la clé applicative

```bash
php artisan key:generate
```

## 5. Créer la base de données

```sql
CREATE DATABASE resafit_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## 6. Lancer les migrations et le seeder

```bash
php artisan migrate:fresh --seed
```

## 7. Enregistrer le middleware admin

Dans `bootstrap/app.php` (Laravel 11) :

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
})
```

## 8. Installer le package QR Code

```bash
composer require simplesoftwareio/simple-qrcode
```

## 9. Lancer le serveur

```bash
php artisan serve
```

---

## Comptes de test (créés par le seeder)

| Rôle | Email | Mot de passe |
|------|-------|-------------|
| Admin | admin@resafit.com | admin123 |
| Utilisateur | user@resafit.com | user123 |

---

## Flux fonctionnel

1. L'utilisateur s'inscrit → `role_id = 2` automatiquement
2. Il se connecte → redirigé vers `/user/dashboard`
3. Il consulte les cours → `/courses`
4. Il réserve un cours → `status: pending`
5. L'admin valide depuis `/admin/dashboard` → email envoyé
6. L'utilisateur génère son QR → `/user/qrcode` (valable 5 min)
7. L'admin scanne le QR → `/admin/qr/validate/{token}` → accès logué
