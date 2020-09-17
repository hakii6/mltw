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



Auth::routes();

Route::get('/redirect', 'Auth\SocialAuthGoogleController@redirect');
Route::get('/callback', 'Auth\SocialAuthGoogleController@handleCallback');


Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('papara')->group(function(){

    Route::get('/' , function(){

        $user = Auth::user();
        if($user){

            if($user->isAdmin()){

                return view('admin')->with('user' , $user)->with('admin' , $user->isAdmin());

            }

        }else{

            return view('papara');

        }
    });

});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');


