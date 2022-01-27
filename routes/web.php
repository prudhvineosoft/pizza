<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signup;
use Illuminate\Contracts\Session\Session;

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
Route::post('/postSignup',[signup::class,'postSignup']);
Route::post('/postLogin',[auth::class,'login']);
Route::post('/dashboard/postAddPizza',[dashboard::class,'postAddPizza']);
Route::post('/addToCart',[dashboard::class,'addToCart']);
Route::post('/payment',[dashboard::class,'payment']);
Route::post('/updateQuantity',[dashboard::class,'updateQuantity']);



Route::get('/', function () {
    if(session()-> has('user')){
       return redirect('/dashboard/home');
    }else{
        return view('auth.login');
    }
});
Route::view('/dashboard', 'dashboard');
Route::get('/dashboard/logout', function() {
    session()->pull('user');
    return redirect('/');
});
Route::get('/signup',[signup::class,'signup']);
Route::get('/dashboard/home',[dashboard::class,'home']);
Route::get('/dashboard/menu',[dashboard::class,'menu']);
Route::get('/dashboard/addPizza',[dashboard::class,'addPizza']);
Route::get('/dashboard/cart',[dashboard::class,'cart']);
Route::get('/dashboard/checkout/{total}',[dashboard::class,'checkout']);
Route::delete('/deleteCartItem',[dashboard::class, 'deleteCartItem']);

