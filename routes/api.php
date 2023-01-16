<?php

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


//API PARA PEDIDOS LISTAR, SAVAR, ACTUALIZAR, ELIMINAR

Route::get('/listar_order', [App\Http\Controllers\OrderController::class, 'show']);

Route::post('/store_order', [App\Http\Controllers\OrderController::class, 'storeApi'])->name('order.store');


Route::post('/update_order', [App\Http\Controllers\OrderController::class, 'update']);

Route::delete('/delete_Order/{id}', [App\Http\Controllers\OrderController::class, 'delete']);





//API PARA CATEGORIA LISTAR, SAVAR, ACTUALIZAR, ELIMINAR


Route::get('/listar_category', [App\Http\Controllers\CategoryController::class, 'show']);

Route::post('/store_category', [App\Http\Controllers\CategoryController::class, 'store']);

Route::post('/update_category', [App\Http\Controllers\CategoryController::class, 'update']);

Route::delete('/delete_category/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);

