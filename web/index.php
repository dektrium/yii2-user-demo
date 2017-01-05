<?php

require(dirname(__DIR__) . '/vendor/autoload.php');
require(dirname(__DIR__) . '/config/helpers.php');

try {
    (new Dotenv\Dotenv(dirname(__DIR__) . '/config'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
}

defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG', true));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'dev'));

require(dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php');

$config = require(dirname(__DIR__) . '/config/web.php');
(new yii\web\Application($config))->run();