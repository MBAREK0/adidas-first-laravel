<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\UserController;
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
 Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('products.index');
 });

 
 Route::resource('products', ProductController::class) ;
 Route::resource('cat', CategoryController::class) ;

 Route::get('/user', [UserController::class, 'list_Users']);
 Route::get('/create', [UserController::class, 'create']);
 Route::post('/add', [UserController::class, 'add_User']);
 Route::delete('/delete/{id}', [UserController::class, 'delete_User']);
 Route::get('/edit/{id}', [UserController::class, 'edit_User']);
 Route::post('/update/{id}', [UserController::class, 'update_User']);




