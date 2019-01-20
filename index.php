<?php

include 'core\__autoloader.php';

$router = Router::get($_SERVER['REQUEST_URI']);
$router->route();