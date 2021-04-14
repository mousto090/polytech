<?php


namespace App\Controllers;


use App\Models\User;
use App\Repository\CountryRepository;
use App\Repository\UserRepository;

class UserController
{

    public function index()
    {
        $users = UserRepository::all();
        require_once VIEWS_DIR . 'home.php';
    }


    public function register()
    {
        $countries = CountryRepository::all();
        require VIEWS_DIR . 'register.php';
    }

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

    public function delete()
    {
        $id = $_GET['id'];
        if (!empty($id)) {
            UserRepository::delete($id);
        }
        $this->index();
    }

    public function error(\Exception $e)
    {
        $error = $e->getMessage();
        $error .= "<pre>{$e->getTraceAsString()}</pre>";
        echo $error;
    }
}