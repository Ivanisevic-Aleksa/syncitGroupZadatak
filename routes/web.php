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

// Default route
Route::get('/', [App\Http\Controllers\ContactController::class, 'contacts']);    

Auth::routes();

Route::get('/add_contact', [App\Http\Controllers\ContactController::class, 'addContact'])->middleware('auth');
Route::post('/add_contact', [App\Http\Controllers\ContactController::class, 'storeContact'])->middleware('auth');
