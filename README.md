# Les Elevages du Terroir

Ce projet est un site web réalisé avec Laravel, Inertia.js, Vue.js et Vite. L'objectif de ce projet est de démontrer la mise en œuvre d'une application web moderne en utilisant ces technologies.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

-   PHP >= 8.2
-   Composer
-   Node.js >= 18.0.0
-   npm ou yarn

## Installation

Suivez les étapes ci-dessous pour installer et configurer le projet.

### 1. Cloner le dépôt

`git clone <URL_DU_DEPOT>
cd Les_Elevages_du_Terroir`

### 2. Installer les dépendances backend

`composer install`

### 3. Installer les dépendances frontend

`npm install`

ou

`yarn install`

### 4. Configurer l'environnement

Copiez le fichier \`.env.example\` et renommez-le en \`.env\`.

`cp .env.example .env`

Modifiez le fichier \`.env\` si nécessaire avec vos configurations spécifiques.

### 5. Générer la clé de l'application

`php artisan key:generate`

### 6. Mettre en place la base de données

Utilisez la commande suivante pour exécuter les migrations et peupler la base de données avec les données de base :

`php artisan migrate:fresh --seed`

### 7. Créer un utilisateur

Comme il n'y a pas de fonctionnalité de registre sur le site, vous devez créer un utilisateur en utilisant la commande suivante et suivre les instructions :

`bash
php artisan user:create
`

## Démarrage du serveur de développement

Pour démarrer le serveur de développement Laravel et le serveur de développement Vite, utilisez les commandes suivantes :

### Backend (Laravel)

`bash
php artisan serve
`

### Frontend (Vite)

`bash
npm run dev
`

ou

`yarn dev`

## Temps de réalisation

Le projet a nécessité environ 4 à 5 jours de travail. En tant que développeur familiarisé avec Laravel et Next.js, mais ayant peu d'expérience avec Vue.js, j'ai pris le temps d'apprendre et d'intégrer Vue.js et Inertia.js dans ce projet. Le processus d'apprentissage et de mise en œuvre a été intensif mais enrichissant, permettant de découvrir et de maîtriser de nouvelles technologies en peu de temps.

### Points Clés

-   **Laravel** gère les aspects backend, y compris l'API et la gestion de la base de données.
-   **Inertia.js** sert de pont entre Laravel et Vue.js, permettant de créer une application SPA (Single Page Application) sans avoir à écrire une API séparée.
-   **Vue.js** est utilisé pour les composants frontend, offrant une expérience utilisateur réactive et moderne.
-   **Vite** est utilisé comme bundler et serveur de développement pour une expérience de développement rapide et moderne.
-   **SQLite** est utilisé comme base de données pour simplifier le développement et l'installation.

## Conclusion

Ce projet démontre comment combiner Laravel, Inertia.js, Vue.js et Vite pour créer une application web moderne et performante. Le choix de ces technologies permet de tirer parti des points forts de chaque outil, offrant ainsi une base solide pour le développement d'applications web.

---

N'hésitez pas à me contacter pour toute question ou clarification sur ce projet. Bonne exploration et développement !

---

Assurez-vous d'ajuster \`<URL_DU_DEPOT>\` en fonction de votre dépôt réel.
