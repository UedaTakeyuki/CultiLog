<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', //function () {
//    return view('welcome');
//Route::get('plant', 'PlantController@index');
    'UnitController@index');
//});

// unit
//Route::get('unit', 'UnitsController@index');
Route::resource('unit', 'UnitController');

// plant
Route::get('plant', 'PlantController@index');
Route::get('plant/create', 'PlantController@create');
Route::get('plant/{id}', 'PlantController@show');

Route::post('plant', 'PlantController@store');

// planting
Route::resource('planting', 'PlantingController');

// harvesting
Route::get('harvesting', 'HarvestingController@index');
Route::get('harvesting/create/{planting_id}', 'HarvestingController@create');
Route::post('harvesting', 'HarvestingController@store');
//Route::resource('harvesting', 'HarvestingController');

Route::get('ajaxpro2', function()
{
    $plants = App\Plant::orderBy('kana', 'ASC')->get();
    foreach ($plants as $value){
        $json[] = $value->name;
    }
    return json_encode($json, JSON_UNESCAPED_UNICODE);
});
