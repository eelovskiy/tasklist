<?php

$router->get('/', 'HomeController@index');
$router->get('/tasks/create', 'TaskController@create');
$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/{id}', 'TaskController@show');
$router->delete('/tasks/{id}', 'TaskController@delete');
$router->put('/tasks/{id}', 'TaskController@update');
$router->post('/tasks/create', 'TaskController@create');

$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@login');
