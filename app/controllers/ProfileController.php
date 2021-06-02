<?php

namespace App\Controllers;

use App\Models\Profile;

class ProfileController
{
    protected $profile;
    
    public function __construct()
    {
        $this->profile = new Profile();
    }

    public function insert()
    {
        $this->profile->insert($_POST, $_FILES);

        setcookie('step', 'third');
        setcookie('idUserd');

        return http_response_code(201);
    }
}