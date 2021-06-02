<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\Country;
use App\Models\Member;

class PageController
{
    protected $member;
    protected $countries;

    public function __construct()
    {
        $this->member = new Member();
        $this->countries = new Country();
    }

    /**
     * Show home page and passes the number of users
     */
    public function home()
    {
        $config = require __DIR__ . '/../config/config.php';
        $count = count($this->member->users());
        $countriesList = $this->countries->listCountries();

        return view('index', [
            'count' => $count,
            'config' => $config['share'],
            'countries' => $countriesList
        ]);
    }
}