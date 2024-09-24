<?php

$router->get('/', 'HomeController@index', ['auth']);
$router->get('/tasks/create', 'TaskController@create', ['auth']);
$router->get('/tasks', 'TaskController@index', ['auth']);
$router->get('/tasks/{id}', 'TaskController@show', ['auth']);
$router->delete('/tasks/{id}', 'TaskController@delete', ['auth']);
$router->put('/tasks/{id}', 'TaskController@update', ['auth']);
$router->post('/tasks/create', 'TaskController@create', ['auth']);

$router->get('/auth/register', 'UserController@register', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);
