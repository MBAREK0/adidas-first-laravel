<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
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
    return redirect()->route('products.index');
 });
 
//  Route::get('/home', function () {
//      // return view('welcome');
//      return redirect()->route('products.index');
//   });
 
 
 //Route::resource('products', ProductController::class)->middleware('auth');
 
 Route::resource('products', ProductController::class) ;
 Route::resource('cat', CategoryController::class) ;
