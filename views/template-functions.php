<?php
if (!function_exists('get_header')) {
    function get_header() {
        require_once VIEWS_DIR . 'header.php';
    }
}


if (!function_exists('get_footer')) {
    function get_footer() {
        require_once VIEWS_DIR . 'footer.php';
    }
}