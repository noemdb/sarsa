<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los CRUD de los diferentes modelos DB
|
*/

// INI resource
Route::resource('models/crud/users','Crud\UserController', ['except' => ['show']]);
Route::resource('models/crud/profiles','Crud\ProfileController', ['except' => ['show']]);
Route::resource('models/crud/rols','Crud\RolController', ['except' => ['show']]);
// FIN resource

// INI GET -> papeleras


// FIN GET -> papeleras

 ?>