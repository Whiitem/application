<?php

define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require_once ROOT.'core\__loader.php';

/*if(!Config::getInstance()->isset('user_session'))
    Config::getInstance()->set('user_session', true);*/

//Application::app()->route();

$router = new Router;
$router->route();