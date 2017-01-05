<?php

/**
 * Session component configuration.
 * You can select between preconfigured session components (file and db) by changing value of SESSION_DRIVER
 * env property in your .env file.
 * NOTE: If you want to use "db" session backend, then you need to apply migration from @app/migrations/session. You can
 * do that by uncommenting corresponding section of migration command configuration located in @app/config/console.php.
 * @see http://www.yiiframework.com/doc-2.0/guide-runtime-sessions-cookies.html
 */

use yii\helpers\ArrayHelper;

$defaults = [];

$drivers = [
    'file' => [
        'class' => 'yii\web\Session',
    ],
    'db' => [
        'class' => 'yii\web\DbSession',
        'sessionTable' => env('SESSION_DB_TABLE', '{{%session}}'),
    ],
];

return ArrayHelper::merge($defaults, $drivers[env('SESSION_DRIVER', 'file')]);