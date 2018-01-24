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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//rutas iniciales
Route::get('/home', 'HomeController@index')->name('home');

//INI establecer setting para los usuarios
require (__DIR__ . '/settings/users.php');
//FIN establecer setting para los usuarios

//rutas para admin
Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'], function(){

    //INI Route iniciales
    require (__DIR__ . '/admin/iniciales.php');
    //FIN Route iniciales

    //INI CRUD modelos
    require (__DIR__ . '/admin/crud.php');
    //FIN CRUD modelos
    
    //INI Charts modelos
    require (__DIR__ . '/admin/charts.php');
    //FIN Charts modelos

    //INI rutas para los json
    require (__DIR__ . '/admin/json/index.php');
    //FIN rutas para los json    
    
});
