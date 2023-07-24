# MoneyValue API et Administration

MoneyValue est une application de conversion de devises avec une API RESTful et une interface d'administration pour gérer les paires de devises et les conversions

Description

MoneyValue est une application web construite avec Laravel, fournissant une API pour la conversion de devises et une interface d'administration pour gérer les paires de devises et les conversions. L'API permet aux développeurs de convertir des devises en utilisant les taux de change spécifiés entre les paires. L'interface d'administration permet aux utilisateurs autorisés d'ajouter, de modifier ou de supprimer des paires de devises et d'afficher le nombre de conversions effectuées pour chaque paire.

Installation

Pour installer et exécuter l'application MoneyValue, procédez comme suit :

1. Clonez le dépôt sur votre ordinateur en utilisant 'git clone'.

2. Installez les dépendances nécessaires en exécutant 'composer install' à la racine du projet.

3. Créez un nouveau fichier '.env' basé sur le fichier '.env.example' et configurez la connexion à la base de données.

3. Générez une clé d'application en utilisant 'php artisan key:generate'.

5. Lancer les migrations de base de données et les seeders pour créer les tables nécessaires et remplir les données initiales avec 'php artisan migrate --seed'.

6. Démarrer le serveur de développement avec 'php artisan serve'.

API

L'API permet aux développeurs d'effectuer les actions suivantes :

Vérifier si le service est fonctionnel : GET /api.

Obtenir la liste des paires de devises prises en charge : GET /api/pairs.

Convertir une quantité de devises en utilisant une paire spécifique : POST /api/currencies.
