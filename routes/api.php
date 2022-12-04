<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\KodeController;
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

// Route::get('kode',[KodeController::class,'index']);
// Route::get('kode/{id}',[KodeController::class,'show']);
// Route::post('kode',[KodeController::class,'store']);
// Route::post('kamar/{id}',[KamarController::class,'update']);
// Route::delete('kamar/{id}',[KodeController::class,'destroy']);

Route::apiResource('kamars', KamarController::class);

Route::apiResource('kodes',KodeController::class);


