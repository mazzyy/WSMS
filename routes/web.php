<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
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

//welcome

Route::get('/',"App\Http\Controllers\welcome@index");
Route::get('/info',"App\Http\Controllers\welcome@info");


//client and dashboard
Route::get('dashboard/{id}/update',"App\Http\Controllers\clientController@update1");
Route::get('dashboard/{id}/DELETE',"App\Http\Controllers\clientController@delete");
Route::get('/mystore',"App\Http\Controllers\clientController@mystore");
Route::resource("/dashboard","App\Http\Controllers\clientController");
Route::get('/info/status',"App\Http\Controllers\clientController@status");

//record
Route::get("/dashboard/{id}/client","App\Http\Controllers\dataController@index");
Route::get("/dashboard/{id}/date","App\Http\Controllers\dataController@date");
Route::get("/dashboard/{id}/client/record","App\Http\Controllers\dataController@record");
Route::get("/dashboard/{id}/delete","App\Http\Controllers\dataController@delete");
// 

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
