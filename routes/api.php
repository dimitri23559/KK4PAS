<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\InformasiplgnController;
use App\Http\Controllers\konfirmasiplgnController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('kode',[InformasiplgnController::class,'index']);
// Route::get('kode/{id}',[InformasiplgnController::class,'show']);
// Route::post('kode',[KodeController::class,'store']);
// Route::post('kamar/{id}',[KamarController::class,'update']);
// Route::delete('kamar/{id}',[KodeController::class,'destroy']);

Route::apiResource('kamars', KamarController::class);

Route::apiResource('kodes',KodeController::class);



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);




Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('informasi', InformasiplgnController::class);


    Route::post('/logout', [AuthController::class, 'logout']);


    Route::apiResource('status', konfirmasiplgnController::class);

});