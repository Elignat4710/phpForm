<?php

use App\Core\App;

App::bind('config', require ('app/config/config.php'));

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view($name, $data = null)
{
    if (is_array($data)) {
        extract($data);
    }
    return require "app/views/{$name}.view.php";
}