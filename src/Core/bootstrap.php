<?php 
use Core\Database\Database;
use Core\App;
use Core\Database\Query;

require __DIR__ . '/functions.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . '/../');
$dotenv->load();

// App::bind('config', require __DIR__ . '/config.php');
App::bind('database', new Query(
    Database::connect($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'])
));
