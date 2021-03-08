<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\user\LoginController;

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

Route::get('/', function () { return view('welcome'); })->middleware('auth');

// Page Login
Route::get('/login', function () { return view('guard.userLogin'); })->middleware('guest');

// Page Register
Route::get('/register', function () { return view('guard.userRegister'); })->middleware('guest');

// Route::post('/login', function () {
//     return view('guard.userLogin', ['user\LoginController','authenticate']);
// })->name('login');

Route::post('/login','user\LoginController@authenticate')->name('login');
Route::post('/register','user\LoginController@register')->name('register');


// Logout
Route::get('/logout', function () { Auth::logout(); return Redirect::to('login'); });

// Get All Users
Route::get('/users','user\UserController@index')->name('users.index')->middleware('auth');


// Guard Admin

Route::post('/admin/login','admin\LoginController@authenticate')->name('admin.login');
Route::post('/admin/register','admin\LoginController@register')->name('admin.register');
// Get All Admin
Route::get('/admins','admin\AdminController@index')->name('admin.index')->middleware('auth:admin');

// Page Login
Route::get('/admin/login', function () { return view('guard.adminLogin'); })->middleware('guest');

// Page Register
Route::get('/admin/register', function () { return view('guard.adminRegister'); })->middleware('guest');

// Logout Admin
Route::get('admin/logout', function () {
 	Auth::guard('admin')->logout();
   	return redirect('/');
});