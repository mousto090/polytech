<?php


namespace App\Controllers;


use App\Models\User;
use App\Repository\CountryRepository;
use App\Repository\UserRepository;

class UserController
{

    /**
     * Affichage la page d'accueil avec la liste de tous
     * les utilisateurs
     */
    public function index()
    {
        $users = UserRepository::all();
        require_once VIEWS_DIR . 'home.php';
    }

    /**
     * Affichage du formulaire pour ajouter un nouvel utilisateur
     */
    public function register()
    {
        $countries = CountryRepository::all();
        require VIEWS_DIR . 'register.php';
    }

    /**
     * Récupèration les données du formulaire d'inscription
     * pour une sauvegarder dans la base puis affichage la liste
     * des utilisateurs
     */
    public function store()
    {
        $data = [
            'first_name' => $_POST['first_name'] ?? null,
            'last_name' => $_POST['last_name'] ?? null,
            'country_id' => $_POST['country_id'] ?? null,
        ];
        // Check the presence of all value
        if (!empty(array_filter($data))) {
            UserRepository::add(new User($data));
        }
        $this->index();
    }

    /**
     * Affiche le formulaire pour mettre à jour un utilisateur
     */
    public function update()
    {
        $id = $_GET['id'] ?? 0;
        $countries = CountryRepository::all();
        $user = UserRepository::get($id);
        if(empty($user)) {
            $this->index();
            return;
        }
        require VIEWS_DIR . 'update.php';
    }

    /**
     * Récupération des informations du formulaire de mise à jour
     * d'un utilisatuer et mise à jour de l'enregistrement dans la base
     */
    public function save_update()
    {
        $data = [
            'id' => $_POST['id'] ?? '',
            'first_name' => $_POST['first_name'] ?? null,
            'last_name' => $_POST['last_name'] ?? null,
            'country_id' => $_POST['country_id'] ?? null,
        ];
        // Check the presence of all value
        if (!empty(array_filter($data))) {
            UserRepository::update(new User($data));
        }
        $this->index();
    }

    /**
     * Suppression d'un utilisateur par id et
     * réaffichage de la liste des utilisateurs restants
     */
    public function delete()
    {
        $id = $_GET['id'];
        if (!empty($id)) {
            UserRepository::delete($id);
        }
        $this->index();
    }

    /**
     * Lorsqu'une erreur se produit on affiche pour faciliter le
     * débuggage en mode développement
     * @param \Exception $e
     */
    public function error(\Exception $e)
    {
        $error = $e->getMessage();
        $error .= "<pre>{$e->getTraceAsString()}</pre>";
        echo $error;
    }
}