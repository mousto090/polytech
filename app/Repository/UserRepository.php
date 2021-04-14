<?php


namespace App\Repository;


use App\database\Database;
use App\Models\Country;
use App\Models\User;
use PDO;

class UserRepository
{

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

    public static function add(User $user): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare(
            'insert into users set id=:id, first_name=:first_name, last_name=:last_name, country_id=:country_id'
        );

        return $statement->execute([
            'id' => $user->getId(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'country_id' => $user->getCountryId(),
        ]);
    }

    public static function get(string $id): User
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('SELECT * FROM users WHERE id=:id');
        $statement->execute(['id' => $id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new User($data);
    }


    public static function update(User $user): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare(
            'update users set first_name=:first_name, last_name=:last_name, country_id=:country_id where id=:id'
        );

        return $statement->execute([
            'id' => $user->getId(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'country_id' => $user->getCountryId(),
        ]);
    }

    public static function delete($id): bool
    {
        $db = Database::getInstance()->getConnexion();
        $statement = $db->prepare('delete from users where id=:id');

        return $statement->execute(['id' => $id]);
    }
}