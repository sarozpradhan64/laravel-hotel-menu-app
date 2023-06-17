<?php

namespace App\Helper;

class AppHelper
{
    public static function myTitle($text)
    {
        return strtoupper(str_replace('_', ' ', $text));
    }
}
