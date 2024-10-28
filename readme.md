# Garage V. Parrot
Le garage automobile V. Parrot est ouvert depuis 2021 à Toulouse. Son propriétaire
Vincent Parrot, 15 ans d'expérience dans la réparation automobile, propose plusieurs
services : réparation de carrosserie et mécanique, entretien et vente de voitures
d’occasion. Grâce à ses employés, le garage est connu pour la bonne qualité de ses
services. Par ailleurs, le garage n’a aucune visibilité sur internet. M. Parrot reconnaît
qu’il serait bien utile d’avoir un site internet pour se faire une place parmi la
concurrence.
Les fonctionnalités souhaitées par le propriétaire sont :
- un compte administrateur où il pourra gérer les informations du site web ainsi
que créer les comptes de ses employés.
Le compte employé sera capable d’ajouter de nouvelles voitures, de modérer
les témoignages et d’ajouter des témoignages.
Ils pourront, administrateur et employés, se connecter avec le même
formulaire de connexion en entrant une adresse e-mail et un mot de passe.
- une présentation claire et concise des différents services.
- une indication des horaires d’ouverture placée dans le pied de page.
- une présentation des voitures d’occasion avec des photos et une description
détaillée.
- un filtrage de la liste des véhicules d’occasion en fonction d’une fourchette de
prix, d’un nombre de km parcourus et d’une année de mise en circulation.
- une page contact avec le numéro de téléphone et un formulaire de contact.
Dans le formulaire, le visiteur devra fournir son nom, prénom, adresse e-mail,
numéro de téléphone et le message.
- une section de témoignages sur la page d’accueil où les visiteurs pourront
laisser un témoignage composé d’une note, d’un nom, de la date de visite au
garage et d’un commentaire.
Vincent Parrot demande un site vitrine qui reflète la philosophie du garage qui est de
délivrer un service de qualité et personnalisé à chaque client.

## Environnement de développement

### Pré-requis

#### Front
HTML 5
CSS 3
Bootstrap 5
JavaScript


#### Back
PHP 8.2.4
Composer
Symfony CLI 5.5.6
Docker
Docker-compose
nodejs et npm
MySQL

Vous pouvez vérifier les pré-requis Back avec la commander suivante (de la CLI Symfony) : Symfony check:requirements


#### Serveur
MySQL
Xampp

### Lancer l'environnement de développement
1.Importer le depôt GitHub dans le fichier htdocs du logiciel Xampp.

2.Dans la l'invite de commande de l'éditeur de code taper : 
    1- compser install
    2- npm install
    3- docker-composer up -d
    4- Symfony serve -d (pour afficher le site)

### Ajouter des données de tests
symfony console doctrine:fixatures:load

### Fabriqué avec 
VSCode




## Lancer des tests
php bin/php --testdox




## Se connecter au compte admin 
Entrer dans la barre de recherche du navigateur : http://127.0.0.1:8000/login
