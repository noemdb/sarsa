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
        'topnavbar_messages' => 'true',
        'topnavbar_tasks' => 'false',
        'topnavbar_alerts' => 'false',
        'topnavbar_logdbs' => 'false',
        'topnavbar_loginouts' => 'false',
        'numregpag_userlist' => '10'
    ]);
    return "registrado";
});
//FIN establecer setting para los usuarios

//rutas para admin
Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'HomeController@index')->name('home');

    //INI rutas para los api
    Route::get('/api/charts/taskmonth', 'Api\Charts\DashboardController@getApiTaskMonth')->name('taskmonth');
    Route::get('/api/charts/uservrstask', 'Api\Charts\DashboardController@getApiUserTaskLoad')->name('uservrstask');
    Route::get('/api/charts/uservrstaskasig', 'Api\Charts\DashboardController@getApiUserTaskAsig')->name('uservrstaskasig');
    Route::get('/api/charts/uservrstaskdone', 'Api\Charts\DashboardController@getApiUserTaskDone')->name('uservrstaskdone');
    
    Route::get('/api/navbar/messenges', 'Api\Navbar\NavbarController@getApiMesseges')->name('getmessenges');
    Route::get('/api/navbar/tasks', 'Api\Navbar\NavbarController@getApiTasks')->name('gettasks');
    Route::get('/api/navbar/alerts', 'Api\Navbar\NavbarController@getApiAlerts')->name('getalerts');
    Route::get('/api/navbar/logdbs', 'Api\Navbar\NavbarController@getApiLogdbs')->name('getlogdbs');
    Route::get('/api/navbar/loginouts', 'Api\Navbar\NavbarController@getApiLoginouts')->name('getloginouts');

    // Route::get('Api/barprogress/taskmonth', 'Api\Barprogress\DashboardController@getApiTaskMonth')->name('taskmonthprogress');
    // Route::get('Api/barprogress/uservrstask', 'Api\Barprogress\DashboardController@getApiUserTaskLoad')->name('uservrstaskprogress');
    // Route::get('Api/barprogress/uservrstaskasig', 'Api\Barprogress\DashboardController@getApiUserTaskAsig')->name('uservrstaskprogress');
    // Route::get('Api/barprogress/uservrstaskdone', 'Api\Barprogress\DashboardController@getApiUserTaskDone')->name('uservrstaskprogress');

    //FIN rutas para los api

    //INI CRUD modelos
    Route::resource('models/users','Crud\UserController');
    Route::resource('models/profiles','Crud\ProfileController');
    //FIN CRUD modelos

	Route::get('/charts/sbadmin', function () {
	    return View::make('elements.charts.sbadmin');
	});

});

// rutas para los Charts
// Route::get('charts/api', 'Charts/ChartController@getApiUserTaskLoad');




























// Route::get('/admin', function () { return view('admin.home'); })->middleware('auth');

// Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'], function(){

//     Route::get('/dashboard', function () {
//         return view('admin.home');
//     });
//     Route::get('/login', function () {
//         return view('admin.auth.login');
//     });
//     Route::get('/charts/sbadmin', function () {
//         return View::make('admin.elements.charts.sbadmin');
//     });
//     Route::get('/charts/flot', function () {
//         return View::make('admin.elements.charts.flot');
//     });
//     Route::get('/charts/morris', function () {
//         return View::make('admin.elements.charts.morris');
//     });
//     Route::get('/tables/simple', function () {
//         return View::make('admin.elements.tables.simple');
//     });
//     Route::get('/tables/datatables', function () {
//         return View::make('admin.elements.tables.datatables');
//     });
//     Route::get('/forms', function () {
//         return View::make('admin.elements.form');
//     });
//     Route::get('/grid', function () {
//         return View::make('admin.elements.grid');
//     });
//     Route::get('/buttons', function () {
//         return View::make('admin.elements.buttons');
//     });
//     Route::get('/icons', function () {
//         return View::make('admin.elements.icons');
//     });
//     Route::get('/panels', function () {
//         return View::make('admin.elements.panel');
//     });
//     Route::get('/typography', function () {
//         return View::make('admin.elements.typography');
//     });
//     Route::get('/notifications', function () {
//         return View::make('admin.elements.notifications');
//     });
//     Route::get('/blank', function () {
//         return View::make('admin.elements.blank');
//     });
//     Route::get('/documentation', function () {
//         return View::make('admin.elements.documentation');
//     });
//     Route::get('/stats', function() {
//        return View::make('admin.elements.stats');
//     });
    Route::get('/progressbars', function() {
        return View::make('elements.progressbars');
    });
//     Route::get('/collapse', function() {
//         return View::make('admin.elements.collapse');
//     });
// });
