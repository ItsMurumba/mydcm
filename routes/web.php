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

Route::get('/home', 'HomeController@index');

Route::get('/index', function () {
    return view('index');
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

//datatables route
//Route::controller('datatables', 'DatatablesController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);
//
//Route::controller('datatables', 'ProfileController', [
//    'anyOrders'  => 'datatables.dataOrders',
//    'anyProperties' => 'datatables.dataProperties',
//]);

Route::get('/datatables/data', array('middleware' => 'auth', 'uses' => 'DatatablesController@anyData'))->name('datatables.data');
Route::get('/datatables/index', array('middleware' => 'auth', 'uses' => 'DatatablesController@getIndex'))->name('datatables');