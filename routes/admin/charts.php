<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos redirecciona a la vista
|
*/

Route::get('models/charts/users', 'Chart\UserController@index')->name('viewchartusers');
Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
Route::get('models/charts/rols', 'Chart\RolController@index')->name('viewchartrols');


?>