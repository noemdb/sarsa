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
Route::get('/setting', function () {
    $user = \App\User::find(\Auth::user()->id);
    // $user->setSetting('first_name','Admin');
    $user->setSettings([
        //view report
        'numregpag_userlist' => '10',
        'numregpag_profilelist' => '10',

        //view topnavbar
        'topnavbar_messages' => 'true',
        'topnavbar_tasks' => 'false',
        'topnavbar_alerts' => 'false',
        'topnavbar_logdbs' => 'false',
        'topnavbar_loginouts' => 'false',

        //sidebar nivel 1
        'sidebar_search' => 'false',
        'sidebar_dashboard' => 'true',
        'sidebar_modelos' => 'true',
        'sidebar_chart' => 'true',
        'sidebar_forms' => 'false',
        'sidebar_tables' => 'true',

        //sidebar nivel 2
        'sidebar_models_users' => 'true',
        'sidebar_models_profiles' => 'true',
        'sidebar_models_rols' => 'true',
        'sidebar_models_messenges' => 'true',
        'sidebar_models_tasks' => 'false',
        'sidebar_models_alerts' => 'true',
        'sidebar_models_logdbs' => 'false',
        'sidebar_models_loginouts' => 'false',    
        
        //sidebar nivel 3
        'sidebar_models_users_crud' => 'true',
        'sidebar_models_users_chart' => 'true',
        'sidebar_models_profiles_crud' => 'true',
        'sidebar_models_profiles_chart' => 'true',
        'sidebar_models_rols_chart' => 'true',
        'sidebar_models_rols_crud' => 'true',
        'sidebar_models_messenges_crud' => 'true',
        'sidebar_models_messenges_chart' => 'true',
        'sidebar_models_tasks_crud' => 'true',
        'sidebar_models_tasks_chart' => 'true',
        'sidebar_models_alerts_crud' => 'false',
        'sidebar_models_alerts_chart' => 'true',
        'sidebar_models_logdbs_crud' => 'true',
        'sidebar_models_logdbs_chart' => 'false',
        'sidebar_models_loginouts_crud' => 'false',
        'sidebar_models_loginouts_chart' => 'false'
    ]);
    return "registrado";
});
//FIN establecer setting para los usuarios

//rutas para admin
Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'], function(){

    //INI Route iniciales
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@index')->name('home');
    //FIN Route iniciales

    //INI CRUD modelos
    Route::resource('models/crud/users','Crud\UserController');
    Route::resource('models/crud/profiles','Crud\ProfileController');
    //FIN CRUD modelos
    
    //INI Charts modelos
    Route::get('models/charts/users', 'Chart\UserController@index')->name('viewchartusers');
    Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
    //FIN Charts modelos

    //INI rutas para los json
    Route::group(['prefix'=>'json','namespace'=>'Json'], function(){

        //INI Charts
        Route::group(['prefix'=>'charts','namespace'=>'Charts'], function(){

            //INI graficas para users
            Route::group(['prefix'=>'users'], function(){
                Route::get('/usersmonth', 'UserController@UsersMonth')->name('usersmonth');
                Route::get('/usersactive', 'UserController@UserActive')->name('usersactive');
                Route::get('/usersconnect', 'UserController@UserConnect')->name('usersconnect');
            });
            //INI graficas para users

            //INI graficas para profiles
            Route::group(['prefix'=>'profiles'], function(){
                Route::get('/profilesmonth', 'ProfileController@ProfilesMonth')->name('profilesmonth');
                Route::get('/profilesdominio', 'ProfileController@ProfilesDominio')->name('profilesdominio');
            });
            //FIN graficas para profiles
            
            //INI graficas para tasks
            Route::group(['prefix'=>'tasks'], function(){
                Route::get('/taskmonth', 'TasksController@getApiTaskMonth')->name('taskmonth');
                Route::get('/uservrstask', 'TasksController@getApiUserTaskLoad')->name('uservrstask');
                Route::get('/uservrstaskasig', 'TasksController@getApiUserTaskAsig')->name('uservrstaskasig');
                Route::get('/uservrstaskdone', 'TasksController@getApiUserTaskDone')->name('uservrstaskdone');
            });
            //FIN graficas para tasks
            
        });
        //FIN Charts
        
        //INI Navbar
        Route::group(['prefix'=>'navbar','namespace'=>'Navbar'], function(){
            Route::get('/messenges', 'TopController@getApiMesseges')->name('getmessenges');
            Route::get('/tasks', 'TopController@getApiTasks')->name('gettasks');
            Route::get('/alerts', 'TopController@getApiAlerts')->name('getalerts');
            Route::get('/logdbs', 'TopController@getApiLogdbs')->name('getlogdbs');
            Route::get('/loginouts', 'TopController@getApiLoginouts')->name('getloginouts');
        });
        //FIN Navbar
        

    });
    //FIN rutas para los json
    
	// Route::get('/charts/sbadmin', function () {
	//     return View::make('elements.charts.sbadmin');
	// });

});

// rutas para los Charts
// Route::get('charts/api', 'Charts/ChartController@getApiUserTaskLoad');
