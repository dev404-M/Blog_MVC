<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Blog\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "BlogController@index");
$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");
$router->get('/dashboard/', "BlogController@showAll");
$router->get('/dashboard/nouveau/', "BlogController@create");
$router->get('/dashboard/:blog/', "BlogController@show");
$router->get('/dashboard/delete/:id', "BlogController@delete");
$router->get('/login?=error', "UserController@error");

$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
$router->post('/dashboard/nouveau/', "BlogController@store");
// $router->post('/dashboard/task/nouveau', "TaskController@store");
// $router->post('/dashboard/:todo/task/:task/delete/', "TaskController@delete");
// $router->post('/dashboard/:todo/task/:task', "TaskController@update");
// $router->post('/dashboard/:todo/task/:task/check', "TaskController@check");
// $router->post('/dashboard/:todo/', "TodoController@update");
// $router->post('/dashboard/:todo/delete/', "TodoController@delete");

$router->run();