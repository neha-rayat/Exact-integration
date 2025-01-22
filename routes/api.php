<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


Route::resource('authentication', AuthController::class);
Route::get('get_token', [AuthController::class, 'gettoken']);
Route::get('refreshtoken', [BaseController::class, 'exactrefreshtoken']);
Route::get('get_division', [BaseController::class, 'get_division']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


