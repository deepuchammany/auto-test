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
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\TodosController::class, 'index'])->name('home');
    Route::get('todo/create', [App\Http\Controllers\TodosController::class, 'create']);
    Route::post('todo/store', [App\Http\Controllers\TodosController::class, 'store']);
    Route::get('todo/delete/{id}', [App\Http\Controllers\TodosController::class, 'destroy']);
    Route::get('todo/complete/{id}', [App\Http\Controllers\TodosController::class, 'complete']);
});