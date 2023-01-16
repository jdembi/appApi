<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('home');
});
*/

Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('home.index');

Route::post('/store_Order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

Route::delete('/delete_Order/{id}', [App\Http\Controllers\OrderController::class, 'delete'])->name('order.delete');






