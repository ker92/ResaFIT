# ResaFit

> Plateforme de réservation de cours de sport avec accès par QR code — Projet BTS SIO SLAM

---

## Présentation

ResaFit est une application web développée dans le cadre du BTS Services Informatiques aux Organisations, option Solutions Logicielles et Applications Métiers (SLAM).

Elle permet à des membres de réserver des cours de sport dans des salles partenaires, d'obtenir un QR code d'accès personnel, et à un administrateur de gérer l'ensemble de la plateforme.

---

## Stack technique

| Couche | Technologie |
|---|---|
| Backend | PHP 8.2 / Laravel 12 |
| Frontend | Blade, Tailwind CSS 3, Vite 7, Alpine.js |
| Base de données | MySQL 8 |
| QR Code | simplesoftwareio/simple-qrcode |
| Icônes | Font Awesome 6.5 |
| Typographies | Bebas Neue, DM Sans, Space Mono (Google Fonts) |
| Tests | PestPHP 4 |

---

## Fonctionnalités

### Espace utilisateur
- Inscription et connexion sécurisées
- Réservation de cours (type, lieu, date, heure)
- Consultation et annulation de ses réservations
- Génération d'un QR code d'accès personnel (valable 5 minutes)
- Dashboard personnel

### Espace administrateur
- Dashboard avec statistiques (réservations en attente, cours, utilisateurs, salles)
- Validation ou refus des réservations en attente
- Création, modification, suppression de cours
- Gestion des salles partenaires (gyms)
- Gestion des utilisateurs
- Validation des QR codes d'accès

---

## Installation

### Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL 8

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/ker92/ResaFIT.git
cd resafit

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier d'environnement
cp .env.example .env

# 4. Générer la clé d'application
php artisan key:generate

# 5. Configurer la base de données dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resafit
DB_USERNAME=root
DB_PASSWORD=

# 6. Exécuter les migrations
php artisan migrate

# 7. Créer le compte administrateur
php artisan tinker
App\Models\User::create([
    'name'     => 'Admin ResaFit',
    'email'    => 'admin@resafit.com',
    'password' => bcrypt('ResaFit@2025!'),
    'role_id'  => 1,
]);
exit

# 8. Installer les dépendances front
npm install

# 9. Compiler les assets
npm run build
```

### Lancer en développement

```bash
composer run dev
```

Cette commande lance simultanément :
- `php artisan serve` — serveur Laravel
- `npm run dev` — Vite HMR
- `php artisan queue:listen` — file de tâches
- `php artisan pail` — logs en temps réel

---

## Structure de la base de données

| Table | Description |
|---|---|
| `users` | Membres et administrateurs |
| `roles` | Rôles (1 = admin, 2 = user) |
| `gyms` | Salles partenaires |
| `courses` | Cours disponibles |
| `reservations` | Réservations des membres |
| `qr_tokens` | Tokens QR d'accès (TTL 5 min) |
| `access_logs` | Historique des accès aux salles |
| `subscriptions` | Abonnements des membres |

---

## Routes principales

### Publiques
| Méthode | URL | Description |
|---|---|---|
| GET | `/` | Page d'accueil |
| GET | `/login` | Formulaire de connexion |
| POST | `/login` | Traitement connexion |
| GET | `/register` | Formulaire d'inscription |
| POST | `/register` | Traitement inscription |
| GET | `/mentions-legales` | Mentions légales |
| GET | `/confidentialite` | Politique de confidentialité |
| GET | `/cgu` | Conditions générales d'utilisation |

### Espace utilisateur (auth requis)
| Méthode | URL | Description |
|---|---|---|
| GET | `/user/dashboard` | Dashboard utilisateur |
| GET | `/user/qrcode` | Génération QR code |
| GET | `/courses` | Liste des cours |
| GET | `/reservations` | Mes réservations |
| POST | `/reservations` | Créer une réservation |
| DELETE | `/reservations/{id}` | Annuler une réservation |

### Espace admin (auth + role_id = 1)
| Méthode | URL | Description |
|---|---|---|
| GET | `/admin/dashboard` | Dashboard admin |
| POST | `/admin/reservation/{id}/validate` | Valider une réservation |
| POST | `/admin/reservation/{id}/reject` | Refuser une réservation |
| GET/POST | `/admin/courses/create` | Créer un cours |
| PUT | `/admin/courses/{id}` | Modifier un cours |
| DELETE | `/admin/courses/{id}` | Supprimer un cours |
| GET/POST | `/admin/gyms/create` | Créer une salle |
| DELETE | `/admin/gyms/{id}` | Supprimer une salle |
| DELETE | `/admin/users/{id}` | Supprimer un utilisateur |
| GET | `/admin/qr/validate/{token}` | Valider un QR code |

---

## Compte administrateur par défaut

| Champ | Valeur |
|---|---|
| Email | `admin@resafit.com` |
| Mot de passe | `ResaFit@2025!` |


---

## Auteur

**Keran Nguema Theydert**
Étudiant BTS SIO SLAM — Metz (57)
contact@resafit.fr

---

## Licence

Projet académique — tous droits réservés © 2025 Keran Nguema Theydert
