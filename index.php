<?php

use Core\Router;
use Utils\View;

require_once __DIR__ . '/vendor/autoload.php';

define('URL', 'http://localhost/Prova_4/');

View::init([
    'URL' => URL,
]);

$router = new Router;
