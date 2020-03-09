
<h1 align="center">Laravel Facebook</h1>


<p align="center">
   <img align="center" src="public/img/facebook.png" width="600">
</p>

<h3>But du projet</h3>
<p>Réalisation de facebook avec laravel</p>
<h3>Etape du projet</h3>
<h4>Création Projet avec laravel  <a href="https://travis-ci.org/laravel/framework"> 
<img align="center" src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" alt="Build Status" width="150"></a></h4>
<p>Création du projet avec la commande : new laravel nom du projet -auth</p>

<h4>Création de la base de donnée


<a href="https://www.mamp.info/fr/"> 
<img align="center" src="https://www.mamp.info/images/icons/mamp.png" alt="Build Status" width="40"></a>



<img align="center" src="https://c7.uihere.com/icons/210/340/991/mysql-5fba0f1cddb0c0db446ec9f49b1b5d31.png" alt="Build Status" width="40">
</h4>
<p>Création de la base avec mamp puis connexion a cette base de données depuis le fichier .env.</p>

<h4>Migration - Seeder</h4>
<p>Création des différentes migrations pour les tables de la base de données ( table posts, users, friends)

Création des seeders pour remplir la table des users avec des vraies infos ( réaliser avec faker ) ainsi qu'une image pour chacun des users, la table des posts.</p>

<h4>Authentification : Login / Register</h4>
<p>Grâce à laravel, la partie authentification a été rapide à faire grace à la commande du début -auth. J'ai juste dû rajouter un champ username et mettre un champ avatar par défaut.</p>
<h4>Interface / Fonctionnalitées</h4>
<p>J'ai utilisé Boostrap comme framwork pour l'interface</p>
<p>J'ai commencé par l'interface de la page timeline. Avec un champ textera pour que les users ajoutent des posts, puis une partie pour que les posts s'affiche sur la page avec la date de création ainsi que le nom de l'user qui là écrit et son avatar ( relation entre post et user ).</p>
<p>Tous les pots pouront etre like une seul fois par les users</p>
<p>Puis j'ai fait la page welcome, qui représente la premier page du site, les users pourront se connecter directement en cliquant sur les boutons, login ou register qui se trouve sur la nav bar. Ou accéder directement a la timeline si ils sont déja connecte</p>
<p>Ensuite la page account, qui permet aux utilisateurs de modifier leur donnée de leur compte ( avatar, nom, username, email et mot de passe ), et aussi de supprimer leur compte</p>
<p>Pour, la page profil, qui permet aux users de voir leurs posts, leurs amis, mais aussi de pouvoir voir les pages de profil des autres users, et de les ajouter en amis</p> <p>Mais leur demande devra etre validé par l'utilisateur en question.</p>
<p>On retrouve aussi un partie rechercher, pour chercher les utilisateur plus facilement</p>
<p>Ensuite, il y aura la page amis pour voir les amis des users, ainsi que leur demande en cours d'amis...</p>

<h3>Lancer le projet</h3>
<p># Cloner le repo</p>
<p># Lancer les migrations et seeders</p>
<p># Lancer le projet avec la commande php artisan serve</p>
