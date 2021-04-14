<?php
/**
 * Fichier de configuration pour la connection à la base de données
 */
define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWD', 'needle-pass');
define('DB_NAME', 'polytech');

define('PORT','3306');
define('PDO_DATA_SOURCE_NAME', 'mysql:host=' . SERVER . ';port=' . PORT . ';dbname=' . DB_NAME);
