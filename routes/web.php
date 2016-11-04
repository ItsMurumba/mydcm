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
    return view('login');
});

//route for register
Route::get('/registers', '\App\Http\Controllers\Auth\RegisterController@index');

//Route::get('/r', function () {
//    return view('layouts.register');
//});
//Route::get('/r', '\App\Http\Controllers\Auth\RegisterController@index');
//Route::get('/l', function () {
//    return view('login');
//});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');


Route::get('/index', 'HomeController@index');
Route::post('/index', 'HomeController@store');


//services
Route::get('/services', 'ServicesController@index');
Route::post('/services', 'ServicesController@store');

//equipment
Route::get('/equipments', function (){
    return view('equipments');
});
Route::post('/equipments', 'EquipmentsController@store');


//drugs
Route::get('/drugs', function (){
    return view('drugs');
});
Route::post('/drugs', 'DrugsController@store');


//Facility
Route::get('/facility', 'FacilitiesController@index');
Route::post('/facility','FacilitiesController@store');


//Distribution
Route::get('/distribution', function (){
    return view('distribution');
});
Route::post('/distribution','DistributionsController@store');


//estimates
Route::get('/estimates', 'EstimatesController@index');
Route::post('/estimates', 'EstimatesController@store');



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
Route::get('/projections', 'ProjectionController@index');
Route::post('/projections', 'ProjectionController@store');


//route for county form
Route::get('/county', function (){
    return view('county');
});


//diseases
Route::get('/diseases', function (){
    return view('diseases');
});
Route::post('/diseases', 'DiseasesController@store');

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


//datacapture route
Route::post('/datacapture', function (){
    return view('datacapture');
});


//disease costs
Route::get('/diseasecosts', 'DiseaseCostsController@index');
Route::post('/diseasecosts', 'DiseaseCostsController@store');