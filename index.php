<?php

require_once 'vendor/autoload.php';

use Ramon\Academic\core\Router;

$url = $_GET['url'] ?? '';

$router = new Router();

$router->dispatch($url);