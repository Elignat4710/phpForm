<?php

namespace App\Models;

use App\Core\App;

class Country
{
    public function listCountries()
    {
        return App::get('database')->getAllCountries();
    }
}