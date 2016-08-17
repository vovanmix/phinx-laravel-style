<?php

// Init DotEnv
$dotEnv = new Dotenv\Dotenv(__DIR__);
$dotEnv->load();

// Use composer autoloader to load vendor classes
require __DIR__ . '/vendor/autoload.php';

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

//		if (Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
//			return substr($value, 1, -1);
//		}

        return $value;
    }
}

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
            "name" => env('DB_NAME'),
            "user" => env('DB_USER'),
            "pass" => env('DB_PASSWORD'),
            "port" => env('DB_PORT', 3306),
            "socket" => env('DB_SOCKET', null)
        )
    ),
    "aliases" => [
        "default" => "\\Vovanmix\\PhinxLaravelStyle\\MigrationCreator"
    ]
);
