<?php


namespace App\Repository;


use App\database\Database;
use App\Models\Country;
use PDO;

class CountryRepository
{
    /**
     * Exécute une requête pour charger la liste des pays
     * @return array
     */
    public static function all(): array
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('SELECT * FROM countries');
        $statement->execute();

        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        $countries = [];
        foreach ($records as $record) {
            $countries[] = new Country($record);
        }
        return $countries;
    }
}