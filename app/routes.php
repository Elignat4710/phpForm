<?php

$router->get('', 'PageController@home');
$router->post('', 'UserController@insert');
$router->post('insertformtwo', 'ProfileController@insert');
$router->get('users', 'UserController@users');
$router->post('checkEmail', 'UserController@checkEmail');