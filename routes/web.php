<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\ImageController;

Route::get('/images', [ImageController::class, 'index']);
Route::get('/images/{id}', [ImageController::class, 'show']);
Route::post('/images', [ImageController::class, 'store']);
Route::put('/images/{id}', [ImageController::class, 'update']);
Route::delete('/images/{id}', [ImageController::class, 'destroy']);