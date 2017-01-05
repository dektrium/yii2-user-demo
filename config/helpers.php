<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
use yii\helpers\Url;

if (!function_exists('env')) {
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
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
                return true;
            case 'false':
                return false;
            case 'empty':
                return '';
            case 'null':
                return null;
        }
        if (strlen($value) > 1 && StringHelper::startsWith($value, '"') && StringHelper::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }
        return $value;
    }
}

if (!function_exists('h')) {
    /**
     * Wrapper for Html::encode.
     *
     * @param  string  $content
     * @param  boolean $doubleEncode
     * @return string
     */
    function h($content, $doubleEncode = true)
    {
        return Html::encode($content, $doubleEncode);
    }
}

if (!function_exists('purify')) {
    /**
     * Wrapper for HtmlPurifier::process.
     *
     * @param  string              $content
     * @param  array|\Closure|null $config
     * @return string
     */
    function purify($content, $config = null)
    {
        return HtmlPurifier::process($content, $config);
    }
}

if (!function_exists('t')) {
    /**
     * Wrapper for Yii::t.
     *
     * @param  string $category
     * @param  string $message
     * @param  array  $params
     * @param  string $language
     * @return string
     */
    function t($category, $message, $params = [], $language = null)
    {
        return Yii::t($category, $message, $params, $language);
    }
}

if (!function_exists('param')) {
    /**
     * Helper function for retrieving application params.
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    function param($name, $default = null)
    {
        return ArrayHelper::getValue(Yii::$app->params, $name, $default);
    }
}

if (!function_exists('url')) {
    /**
     * Wrapper for Url::to.
     *
     * @param  mixed       $url
     * @param  bool|string $scheme
     * @return string
     */
    function url($url = '', $scheme = false)
    {
        return Url::to($url, $scheme);
    }
}

/**
 * @return bool
 */
function isGuest()
{
    return Yii::$app->user->isGuest;
}