<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Person APIs
Route::get('list-person',[PersonController::class,'listPerson']);
Route::get('single-person/{id}',[PersonController::class,'getSinglePerson']);
Route::post('add-person',[PersonController::class,'createPerson']);
Route::put('update-person/{id}',[PersonController::class,'updatePerson']);
Route::delete('delete-person/{id}',[PersonController::class,'deletePerson']);


