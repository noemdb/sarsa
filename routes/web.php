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

//rutas para WebMaster
Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'], function(){

    Route::get('/', 'HomeController@index')->name('home');
    //INI rutas para los chart-ajax
    Route::get('/api/charts/uservrstask', 'Api\Charts\ChartController@getApiUserTaskLoad')->name('uservrstask');
    Route::get('/api/charts/uservrstaskasig', 'Api\Charts\ChartController@getApiUserTaskAsig')->name('uservrstaskasig');
    Route::get('/api/charts/uservrstaskdone', 'Api\Charts\ChartController@getApiUserTaskDone')->name('uservrstaskdone');
    Route::get('/api/charts/taskmonth', 'Api\Charts\ChartController@getApiTaskMonth')->name('taskmonth');
    //FIN rutas para los chart-ajax

    // Route::get('/api/charts/uservrstaskdone', 'Api\Charts\ChartController@getApiUserTaskNoDone')->name('uservrstasknodone');

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
//     Route::get('/progressbars', function() {
//         return View::make('admin.elements.progressbars');
//     });
//     Route::get('/collapse', function() {
//         return View::make('admin.elements.collapse');
//     });
// });
