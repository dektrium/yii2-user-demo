<?php

/**
 * Cache configuration
 * You can choose between preconfigured cache backends (dummy, file, apc, db) by changing value of CACHE_DRIVER
 * env property in your .env file.
 * @see http://www.yiiframework.com/doc-2.0/guide-caching-overview.html
 */

use yii\helpers\ArrayHelper;

$defaults = [
    'keyPrefix' => env('CACHE_KEY_PREFIX'),
];

$drivers = [
    'dummy' => [
        'class' => 'yii\caching\DummyCache',
    ],
    'file' => [
        'class' => 'yii\caching\FileCache',
        'keyPrefix' => env('CACHE_KEY_PREFIX', ''),
        'cachePath' => env('CACHE_PATH', '@runtime/cache'),
        'cacheFileSuffix' => env('CACHE_FILE_SUFFIX', '.bin'),
    ],
    'apc' => [
        'class' => 'yii\caching\ApcCache',
        'useApcu' => env('CACHE_USE_APCU', false),
    ],
    'db' => [
        'class' => 'yii\caching\DbCache',
        'cacheTable' => env('CACHE_DB_TABLE', '{{%cache}}'),
    ],
];

return ArrayHelper::merge($defaults, $drivers[env('CACHE_DRIVER', 'dummy')]);
