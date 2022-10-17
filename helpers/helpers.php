<?php

use yii\helpers\Inflector;

if (!function_exists('camel2words')) {
    function camel2words($string): string
    {
        return Inflector::camel2words($string);
    }
}
if (!function_exists('id2camel')) {
    function id2camel($string): string
    {
        return Inflector::id2camel($string);
    }
}
