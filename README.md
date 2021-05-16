#Hub3E | Description du besoin


Project Hub3E of [PHP/Symfony](https://github.com/AlixRomain) 

## Build with

- Symfony 5


## Installation

__1 - Git clone the project__

```
https://github.com/AlixRomain/Test_Hub3E
``` 

__2 - Composer install__

Run this command, for download many library :

```
composer install
```

__3 - Create Hub3E-Db and modify the .env file__

Go to [http://localhost:8080/](http://localhost:8080/)

```
User : root
Password: 
```
Create DB named Hub3E and modify the .env file.

__4 - Initialiser la base de donnée__

2 méthodes :

Soit utiliser le fichier .sql dans le dossier public et l'importer dans votre SGBD
Soit utiliser les migrations de doctrine et les fixtures


```
php bin/console doctrine:migrations:migrate 
```

__5 - Fixtures Load__

Run this command, for insert many fixtures in your DB :

```
symfony console doctrine:fixtures:load
```
__6 - Create every path routes from a Postman file __

Take this file at the root and install this in your Postman for get every API routes


__7 - Server - start__

Run this command, for start your server :

```
symfony server:start
```

__8 - Go to [http://127.0.0.1:8000/snowtricks](http://localhost/), all is ready !__

## Usage



Admin account :

```
Pseudo : admin@admin.fr
Password : Hub3E2021!
```
User account :

```
Pseudo : user@user.fr
Password : Hub3E2021!
```


##Context

###1- Vous êtes chargé de développer une API avec les fonctionnalitées suivantes : 

Un annuaire de machines à outils est accesible par différents utilisateurs.
Pour implémenter ces fonctionnalités, vous devez créer les routes suivantes :

Un utilisateur ne peut voir que ses machines à outils;
Un utilisateur peut s'inscrire et ce connecter via JWT Token;
Un crud est nécessaire sur la table Tools;

Utiliser FOSRESTBUNDLE et JMS SERIALIZER
