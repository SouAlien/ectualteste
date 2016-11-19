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
/**
 * Rotas de login
 */

/**
 * Realiza o login
 * @param login , senha
 * @method POST
 */
$app->post('/login', 'Login@logar');
/**
 * Retorna o Status do usuario
 * Tipo {
 * 		1 : Corretor 
 * 		2 : Administrador
 * }
 */
$app->post('/status', 'Login@status');
/**
 * Efetua o Logout
 */
$app->post('/logout', 'Login@logout');

$app->get('/teste', 'Login@teste');


