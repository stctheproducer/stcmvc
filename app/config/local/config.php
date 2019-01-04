<?php
define('ROOT_PATH', dirname(dirname(dirname(__DIR__))));

require_once ROOT_PATH . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(ROOT_PATH);
$dotenv->load();

return [
    'app_name'    => env('APP_NAME'),
    'environment' => env('APP_ENV'),
    'app_url'     => env('APP_URL'),
    'app_root'    => ROOT_PATH, // dirname(dirname(__FILE__)),
    'db_driver'   => env('DB_DRIVER'),
    'db_host'     => env('DB_HOST'),
    'db_port'     => env('DB_PORT'),
    'db_database' => env('DB_DATABASE'),
    'db_username' => env('DB_USERNAME'),
    'db_password' => env('DB_PASSWORD'),
];
