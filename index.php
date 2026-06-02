<?php
define('BASE_URL', $_SERVER['HTTP_HOST'] ?? 'localhost');

include(__DIR__.'/vendor/autoload.php');
$router = new \App\Router();
$router->execute();