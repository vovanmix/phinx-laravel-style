<?php

// Init DotEnv
$dotEnv = new Dotenv\Dotenv(__DIR__);
$dotEnv->load();

// Use composer autoloader to load vendor classes
require __DIR__ . '/vendor/autoload.php';

return array(
    "paths" => array(
        "migrations" => "database/migrations"
    ),
    "environments" => array(
        "default_migration_table" => "migrations",
        "default_database" => "master",
        "master" => array(
            "adapter" => env("DB_ADAPTER", "mysql"),
            "host" => env('DB_HOST'),
            "name" => env('DB_DATABASE'),
            "user" => env('DB_USERNAME'),
            "pass" => env('DB_PASSWORD'),
            "port" => env('DB_PORT', 3306),
            "socket" => env('DB_SOCKET', null)
        )
    ),
    "aliases" => [
        "default" => "\\lib\\Database\\MigrationCreator"
    ]
);