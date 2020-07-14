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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->group(['prefix' => '/api/'], function() use ($router){

	# ROTA DE LOGIN
	$router->post('login/', 'AuthController@login');
	# ROTA DE LOGOUT
	$router->post('logout/', 'AuthController@logout');

	#ROTAS DO USUÁRIO

	$router->get("usuarios/", "UsuariosController@getAll");
	# REGISTRA UM USUARIO
	$router->post("register/", "AuthController@register");

	$router->get("usuarios/{id}", "UsuariosController@get");
	// $router->post("usuarios/", "UsuariosController@store");
	$router->put("usuarios/{id}", "UsuariosController@update");
	// $router->delete("usuarios/{id}", "UsuariosController@destroy");
	$router->delete("usuarios/{id}", "UsuariosController@softdelete");
	

	#ROTAS DA CORRETORA
	$router->get("corretoras/", "CorretorasController@getAll");
	$router->get("corretoras/{id}", "CorretorasController@get");
	$router->post("corretoras/", "CorretorasController@store");
	$router->put("corretoras/{id}", "CorretorasController@update");
	$router->delete("corretoras/{id}", "CorretorasController@softdelete");

	#ROTAS DO PAPEL
	$router->get("papeis/", "PapeisController@getAll");
	$router->get("papeis/{id}", "PapeisController@get");
	$router->post("papeis/", "PapeisController@store");
	$router->put("papeis/{id}", "PapeisController@update");
	$router->delete("papeis/{id}", "PapeisController@softdelete");

	#ROTAS DA OPERAÇÃO
	$router->get("operacoes/", "OperacoesController@getAll");
	$router->get("operacoes/{id}", "OperacoesController@get");
	$router->post("operacoes/", "OperacoesController@store");
	$router->put("operacoes/{id}", "OperacoesController@update");
	// $router->delete("corretoras/{id}", "UsuariosController@destroy");
	$router->delete("operacoes/{id}", "OperacoesController@softdelete");

});