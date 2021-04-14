<?php


namespace App\database;


use PDO;

/**
 * Class Database
 * @package App\database
 * Singleton connexion to database
 */
class Database
{
    private static ?Database $instance = null;

    protected PDO $connexion;

    private function __construct()
    {
        $this->connexion = new PDO(PDO_DATA_SOURCE_NAME, USER, PASSWD);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Prevent Cloning the singleton
     */
    private function __clone()
    {
    }

    /**
     * Get class instance
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnexion(): PDO
    {
        return $this->connexion;
    }
}