<?php

namespace App\Models;

use App\Core\App;

class Member
{
    public function users()
    {
        return App::get('database')->users();
    }

    public function insert($data)
    {   
        return App::get('database')->insert('user', $data);
    }

    public function check($data)
    {
        return App::get('database')->checkEmail($data);
    }
}