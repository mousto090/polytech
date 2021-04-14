# Inscription utilisateurs


Pour faire tourner le projet, vous avez besoin :

- Installer MySQL

- Installer une version PHP 7.4 ou supérieur.

- Activer l’extension PDO dans le fichier `php.ini`.

- Installer composer

- Ensuite dans un terminer exécuter `composer install` pour génerer les class autoloader

- Le script de la base de données se trouve dans le fichier `app/database/polytech.sql`

- Vous pouvez renseigner les paramètres de connexion à la base de données en modifiant
  le fichier `app/config/db.php`

- Pour faire tourner un serveur de test exécuter la commande `php –S localhost:8000`

- Le serveur écoute sur le port 8000, vous pouvez voir l’application en visitant http://localhost:8000
