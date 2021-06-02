<?php


namespace App\Controllers;

use App\Core\App;
use App\Models\Member;

class UserController
{
    protected $member;
    
    public function __construct()
    {
        $this->member = new Member();
    }
    /**
     * Show users page
     */
    public function users()
    {
        $allProfile = $this->member->users();

        return view('users', $allProfile);
    }

    /**
     * Saves the data in the first step to the database
     * if successful return 201
     * else return 404
     */
    public function insert()
    {
        $userId = $this->member->insert($_POST);
        
        setcookie('idUser', $userId);
        setcookie('step', 'second');
        
        return http_response_code(201);
    }

    /**
     * Action for checking email uniqueness
     */
    public function checkEmail()
    {
        if ($this->member->check($_POST['email'])) {
            echo json_encode(['exists' => true]);
        } else {
            echo json_encode(['exists' => false]);
        }
    }
}