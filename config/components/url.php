<?php

/**
 * Url manager configuration.
 * @see http://www.yiiframework.com/doc-2.0/guide-runtime-routing.html
 */

return [
    'enablePrettyUrl' => env('URL_ENABLE_PRETTY', true),
    'enableStrictParsing' => env('URL_STRICT_PARSING', false),
    'showScriptName' => env('URL_SHOW_SCRIPT_NAME', false),
    'baseUrl' => env('URL_BASE'),
    'hostInfo' => env('URL_HOST_INFO'),
    'scriptUrl' => env('URL_SCRIPT'),
    'suffix' => env('URL_SUFFIX'),
    'normalizer' => [
        'class' => 'yii\web\UrlNormalizer',
        'collapseSlashes' => true,
        'normalizeTrailingSlash' => true,
    ],
    'rules' => [
        '' => 'site/index',
        '<view>' => 'site/page',
        'docs/<title>' => 'site/docs',
    ],
];