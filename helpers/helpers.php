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
if (!function_exists('slug')) {
    function slug($string): string
    {
        return Inflector::slug($string);
    }
}
if (!function_exists('id2human')) {
    function id2human($string): string
    {
        $camel = Inflector::id2camel($string);
        return Inflector::camel2words($camel);
    }
}
if (!function_exists('ordinalize')) {
    function ordinalize($number): string
    {
        return Inflector::ordinalize($number);
    }
}
if (!function_exists('logger')) {
    function logger($str)
    {
        Yii::info($str);
    }
}
if (!function_exists('pluralize')) {
    function pluralize($string): string
    {
        return Inflector::pluralize($string);
    }
}
