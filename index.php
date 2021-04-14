<?php

define('VIEWS_DIR', __DIR__.'/views/');
define('CSRF_TOKEN', 'csrf-token');

/**
 * Load database configuration
 */
require_once 'app/config/db.php';
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/vendor/autoload.php';

/**
 *
 */

require_once VIEWS_DIR . 'template-functions.php';
/**
 * Front controller
 */
require_once __DIR__ . '/public/index.php';