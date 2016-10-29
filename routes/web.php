<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');


Route::get('/index', 'HomeController@index');

//route for register
Route::get('/register', '\App\Http\Controllers\Auth\RegisterController@index');

//services
Route::get('/services', '\App\Http\Controllers\ServicesController@equipments');

//equipment
Route::get('/equipments', function (){
    return view('equipments');
});
//staff-category
Route::get('/staffcategories', function (){
    return view('staffcategories');
});
Route::post('/staffcategories', 'StaffCategoriesController@store');
//projection factors
Route::get('/projectionf', function (){
    return view('projectionfactors');
});
Route::post('/projectionf', 'ProjectionFactorsController@store');
//projections
Route::get('/projections', function (){
    return view('projections');
});
//route for county form
Route::get('/county', function (){
    return view('county');
});

//route for role form
Route::get('/role', function (){
    return view('role');
});

Route::post('/roles', 'RolesController@store');

//route for members form
Route::get('/members', function (){
    return view('members');
});
//datatables
Route::get('/datatables/data', array('middleware' => 'auth', 'uses' => 'DatatablesController@anyData'))->name('datatables.data');
Route::get('/datatables/index', array('middleware' => 'auth', 'uses' => 'DatatablesController@getIndex'))->name('datatables');