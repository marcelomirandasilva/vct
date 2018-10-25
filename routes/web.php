<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get ("/login", 		"AuthController@login")->name('login');
Route::post('/login', 		"AuthController@entrar");
Route::get ('/logout', 		'AuthController@logout')->name('logout');

Route::get 	('/alterasenha',			'UserController@AlteraSenha');
Route::post	('/salvasenha',   		'UserController@SalvarSenha');

   
Route::get('/', 'HomeController@index')->name('home');


//======================= Rotas para os graficos da dashboard       ====================
Route::get('/dash/graf1/data',       'HomeController@graf1');


//========================================================================================
// 										RESOURCE
//========================================================================================
Route::resource('usuario',			      'UserController');
Route::resource('parceiro',			   'ParceiroController');
Route::resource('produto',			      'ProdutoController');
Route::resource('cliente',			      'ClienteController');

