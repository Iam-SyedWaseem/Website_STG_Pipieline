<?php

namespace App\Helpers;

class Utils
{
    public static function getCountryCodes()
    {
        $path = storage_path('app/countries.json');
        return json_decode(file_get_contents($path), true);
    }
}
