<?php

namespace App\Http\Controllers;
use App\Helpers\Utils;

abstract class Controller
{
    public function __construct()
    {
        // Share country codes with all views
        view()->share('countries', Utils::getCountryCodes());
    }
}
