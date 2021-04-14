<?php

use App\Controllers\UserController;
use App\Utils\Utils;

$controller = new UserController();

try {
    Utils::init_session(false);
    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'register':
            $controller->register();
            break;
        case 'store':
            if (!Utils::verify_token()) {
                throw new Exception('CSRF Token non valid', 99);
            }
            $controller->store();
            break;
        case 'update':
            $controller->update();
            break;
        case 'save-update':
            if (!Utils::verify_token()) {
                throw new Exception('CSRF Token non valid', 99);
            }
            $controller->save_update();
            break;
        case 'delete':
            $controller->delete();
            break;
        default:
            $controller->index();

    }

} catch (Exception $e) {
    if ($e->getCode() == 99) {
        Utils::regenerate_session();
    }
    $controller->error($e);
}