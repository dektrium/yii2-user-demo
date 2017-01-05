<?php

/**
 * Console app configuration.
 */

use yii\helpers\ArrayHelper;

$config = [
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => null,
            'migrationNamespaces' => [
                'app\migrations',
                // Uncomment following line if you want to use DB cache driver
                //'app\migrations\cache',
                // Uncomment following line if you want to use DB driver for sessions
                //'app\migrations\session',
            ],
        ],
    ],
];

return ArrayHelper::merge(
    require(__DIR__ . '/common.php'),
    $config
);