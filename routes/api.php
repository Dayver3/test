<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get(/**
 * @param Request $request
 * @return mixed
 */ '/user', function (Request $request) {
    return $request->user();
});
/**
 * UserController
 */
Route::post('/create', [UserController::class, 'createUser']);
Route::delete('/delete', [UserController::class, 'deleteUser']);
Route::patch('/update/{user}', [UserController::class, 'updateUser']);
Route::get('/user', [UserController::class, 'getListUser']);
