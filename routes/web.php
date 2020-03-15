<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/', 'AuthController@postLogin');

$router->group(['middleware'=> "auth"],function ($router){
    $router->get('/test', 'AuthController@test');
    $router->post('/save', 'AuthController@save');
    $router->post('/lists', 'User@lists');
    $router->post('/order', 'User@order');
});




