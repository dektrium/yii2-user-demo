<?php

/**
 * Database configuration.
 * You can choose between preconfigured db components (mysql, pgsql) by changing value of DB_DRIVER
 * env property in your .env file.
 * @see
 */

use yii\helpers\ArrayHelper;

$defaults = [
    'class' => 'yii\db\Connection',
    'enableSchemaCache' => env('DB_SCHEMA_CACHE_ENABLED', false),
    'schemaCacheDuration' => env('DB_SCHEMA_CACHE_DURATION', 3600),
    'enableQueryCache' => env('DB_QUERY_CACHE_ENABLED', true),
    'queryCacheDuration' => env('DB_QUERY_CACHE_DURATION', 3600),
    'charset' => env('DB_CHARSET'),
    'tablePrefix' => env('DB_PREFIX'),
    'username' => env('DB_USER'),
    'password' => env('DB_PASS'),
];

$drivers = [
    'mysql' => [
        'dsn' => 'mysql:host=' . env('DB_HOST', 'localhost') . ';dbname=' . env('DB_NAME'),
    ],
    'pgsql' => [
        'dsn' => 'pgsql:host=' . env('DB_HOST', 'localhost') . ';port=' . env('DB_PORT', '5432') . ';dbname=' . env('DB_NAME'),
    ],
];

return ArrayHelper::merge($defaults, $drivers[env('DB_DRIVER', 'mysql')]);
