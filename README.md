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

`git clone <URL_DU_DEPOT>`
`cd Les_Elevages_du_Terroir`

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

Comme il n'y a pas de fonctionnalité d'inscription sur le site, vous devez créer un utilisateur en utilisant la commande suivante et suivre les instructions :

`php artisan user:create`

## Démarrage du serveur de développement

Pour démarrer le serveur de développement Laravel et le serveur de développement Vite, utilisez les commandes suivantes :

### Backend (Laravel)

`php artisan serve`

### Frontend (Vite)

`npm run dev`

ou

`yarn dev`

## Temps de réalisation

Le projet a nécessité environ 4 à 5 jours de travail. En tant que développeur familiarisé avec Laravel et Next.js, mais ayant peu d'expérience avec Vue.js, j'ai pris le temps d'apprendre et d'intégrer Vue.js et Inertia.js dans ce projet.
