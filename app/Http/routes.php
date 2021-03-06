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

// shelf
Route::resource('shelf', 'ShelfController');

// plant
Route::get('plant', 'PlantController@index');
Route::get('plant/create', 'PlantController@create');
Route::get('plant/excel',
    [
        'as' => 'download.plants.excel',
        'uses' => 'PlantController@excel'
    ]
);
Route::get('plant/{id}', 'PlantController@show');

Route::post('plant', 'PlantController@store');
Route::get('plant/{id}/edit', 'PlantController@edit');  // 追加
Route::patch('plant/{id}', 'PlantController@update');  // 追加

// planting
Route::get('planting/create/{shelf_id}', 'PlantingController@create');
Route::post('planting/close/{id}', 'PlantingController@close');
Route::post('planting/reopen/{id}', 'PlantingController@reopen');
Route::delete('planting/destroy/{id}', 'PlantingController@destroy');
Route::get('planting/excel',
    [
        'as' => 'download.plantings.excel',
        'uses' => 'PlantingController@excel'
    ]
);
Route::resource('planting', 'PlantingController');

// harvesting
Route::get('harvesting', 'HarvestingController@index');
Route::get('harvesting/create/{planting_id}', 'HarvestingController@create');
Route::post('harvesting', 'HarvestingController@store');
Route::get('harvesting/excel', 
    [
        'as' => 'download.harvestings.excel',
        'uses' => 'HarvestingController@excel'
    ]
);
//Route::resource('harvesting', 'HarvestingController');

Route::get('download', function(){
    return View::make('download.index');
});

Route::get('ajaxpro2', function()
{
/*
    $plants = App\Plant::orderBy('kana', 'ASC')->get();
    foreach ($plants as $value){
        $json[] = $value->name;
    }
    */
    //return response()->json(App\Plant::orderBy('kana', 'ASC')->lists("name"));
    $json = App\Plant::orderBy('kana', 'ASC')->lists("name");
    return json_encode($json, JSON_UNESCAPED_UNICODE);
});
