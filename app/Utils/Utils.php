<?php


namespace App\Utils;


class Utils
{
    const PAGES_TITLES = [
        'home' => 'Accueil',
        'register' => 'Inscription',
        'store' => 'Enregistrer',
        'update' => 'Modifier',
        'save_update' => 'Modifier',
        'delete' => 'Supprimer',
    ];

    public static function get_title($key)
    {
        return self::PAGES_TITLES[$key] ?? self::PAGES_TITLES['home'];
    }

    public static function page_title()
    {
        $action = $_GET['action'] ?? '';
        return self::get_title($action);
    }

    /**
     * Initialize session if not already done
     */
    public static function init_session($reinit = false)
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
     * Verify that the csrf token is valid
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