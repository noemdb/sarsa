<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas get para los graficos de profiles
|
*/

Route::group(['prefix'=>'profiles'], function(){
    Route::get('/profilesmonth', 'ProfileController@ProfilesMonth')->name('profilesmonth');
    Route::get('/profilesdominio', 'ProfileController@ProfilesDominio')->name('profilesdominio');
});


 ?>