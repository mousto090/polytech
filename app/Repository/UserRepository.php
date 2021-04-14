<?php


namespace App\Repository;


use App\database\Database;
use App\Models\Country;
use App\Models\User;
use PDO;

class UserRepository
{

    /**
     * Exécute une requête pour charger les des utilisateurs
     * @return array
     */
    public static function all(): array
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('SELECT u.*, c.name FROM users u INNER JOIN countries c ON country_id = c.id');
        $statement->execute();

        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($records as $record) {
            $user = new User($record);
            $user->setCountry(new Country(['id' => $user->getCountryId(), 'name' => $record['name']]));
            $users[] = $user;
        }
        return $users;
    }

    /**
     * Insert un utilisateur dans la base données
     * @param User $user
     * @return bool
     */
    public static function add(User $user): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare(
            'insert into users (id, first_name, last_name, country_id) VALUES (?, ?, ?, ?)'
        );

        return $statement->execute([
             $user->getId(),
             $user->getFirstName(),
             $user->getLastName(),
             $user->getCountryId(),
        ]);
    }

    /**
     * Cherche un utilisateur par son identifiant
     * @param string $id
     * @return User
     */
    public static function get(string $id): User
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('SELECT * FROM users WHERE id=?');
        $statement->execute([$id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new User($data);
    }

    /**
     * Exécute une requête pour mettre à jour les informations d'un
     * utilisateur
     * @param User $user
     * @return bool
     */
    public static function update(User $user): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare(
            'UPDATE users SET first_name=?, last_name=?, country_id=? where id=?'
        );

        return $statement->execute([
            $user->getFirstName(),
            $user->getLastName(),
            $user->getCountryId(),
            $user->getId()
        ]);
    }

    /**
     * Supprimer un utilisateur par id
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('delete from users where id=?');

        return $statement->execute([$id]);
    }
}