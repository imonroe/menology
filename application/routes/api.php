<?php

use Illuminate\Http\Request;
#use App\Http\Controllers\RecordController;
#use App\Http\Controllers\CollectionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('collections/{id}/records', 'CollectionController@getRecords');

Route::apiResources([
    'records' => RecordController::class,
    'collections' => CollectionController::class,
]);
