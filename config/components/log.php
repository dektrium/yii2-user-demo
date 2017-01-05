<?php

/**
 * Logger configuration.
 * @see http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
 */

return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
    ],
];