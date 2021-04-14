<?php


namespace App\Utils;


class Utils
{
    /**
     * Titres des pages de l'application
     */
    const PAGES_TITLES = [
        'home' => 'Accueil',
        'register' => 'Inscription',
        'store' => 'Enregistrer',
        'update' => 'Modifier',
        'save_update' => 'Modifier',
        'delete' => 'Supprimer',
    ];

    /**
     * Retourne le titre d'un page
     * @param $key
     * @return string
     */
    public static function get_title($key)
    {
        return self::PAGES_TITLES[$key] ?? self::PAGES_TITLES['home'];
    }

    /**
     * Selon la page où on se trouve, cette fonction retourne le titre de cette page
     * @return string
     */
    public static function page_title()
    {
        $action = $_GET['action'] ?? '';
        return self::get_title($action);
    }

    /**
     * Initialise une session php.
     * Pour la sécurité nous générons un token CSRF qui sera stocké
     * dans la session et dont la validité sera vérifié à chaque fois
     * qu'un formulaire sera posté
     * @param bool $reinit
     * @throws \Exception
     */
    public static function init_session(bool $reinit = false)
    {
        if(empty($_SESSION)) {
            session_start();
        }

        if (empty($_SESSION[CSRF_TOKEN]) || $reinit) {
            $_SESSION[CSRF_TOKEN] = bin2hex(random_bytes(32));
        }
    }

    /**
     * Regenerate the session
     */
    public static function regenerate_session()
    {
        session_regenerate_id(true);
        self::init_session(true);
    }

    /**
     * Vérifié la validité du token
     * @return bool
     */
    public static function verify_token(): bool
    {
        if (!empty($_POST[CSRF_TOKEN])) {
            return hash_equals($_SESSION[CSRF_TOKEN], $_POST[CSRF_TOKEN]);
        }
        return false;
    }
}