<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 2019-01-07
 * Time: 12:54
 */

namespace App\Libs;

/**
 * Class Tools
 * @package App\Libs
 */
class Tools
{
    /**
     * @param $string
     * @return string|string[]|null
     */
    public static function clean($string)
    {
        $string = str_replace('&nbsp;', '', htmlentities($string));
        
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        
        return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
    }
}