<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/showtables',['uses'=>'SchemaWebsocketController@showTables']);
$router->get('/describe_table/{table}',['uses'=>'SchemaWebsocketController@describeTable']);
$router->get('/show_data/{table}',['uses'=>'SchemaWebsocketController@dataTable']);

$router->get('/chat/{message}',['uses'=>'WebSocketController@getMessage']);




