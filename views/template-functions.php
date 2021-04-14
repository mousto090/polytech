<?php
if (!function_exists('get_header')) {
    /**
     * Ajoute le header sur toutes les page
     */
    function get_header() {
        require_once VIEWS_DIR . 'header.php';
    }
}


if (!function_exists('get_footer')) {
    /**
     * Ajoute le footer sur toutes les page
     */
    function get_footer() {
        require_once VIEWS_DIR . 'footer.php';
    }
}