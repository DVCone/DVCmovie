<?php

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
    return view('welcome');
});

Route::get('/login', ['as' =>'auth.login', 'uses' => 'AuthController@login' ]);

Route::post('/login', ['as' =>'auth.auth', 'uses' => 'AuthController@authenticate' ]);

Route::get('/logout', ['uses' => 'AuthController@destroy', 'as' => 'auth.destroy']);

Route::group(['middleware' => 'verify.auth'], function() {

    Route::get('/home',['as' => 'admin.home', 'uses' =>  'Admincontroller@home' ]);
    
    Route::get('/admin',['as' => 'admin.admin', 'uses' =>  'Logincontroller@admin' ]);
    
    Route::get('/guest', 'Logincontroller@guest');
    
    Route::get('/guest/detail/{id}', ['as' => 'guest.detail', 'uses' => 'Guestcontroller@detailguest' ]);    
    
    Route::get('/admin/users', ['as' => 'admin.users', 'uses' => 'Moviecotroller@users']);
});

Route::get('/list', ['as' => 'guest.list', 'uses' => 'Guestcontroller@list']);

Route::get('/guest',['as' => 'guest.home', 'uses' =>  'Guestcontroller@home' ]);

Route::post('/guest/rent', ['as' => 'guest.rent', 'uses' => 'Guestcontroller@rent']);

Route::delete('/admin/destroy/{id}', ['as' => 'movies.destroy', 'uses' => 'Admincontroller@destroy' ]);

Route::get('/movie/create', ['as' => 'movies.create', 'uses' => 'Admincontroller@create' ]);
    
Route::post('/movie/create', ['as' => 'movies.store', 'uses' => 'Admincontroller@store' ]);    
    

Route::get('/movie', ['uses' => 'Moviecotroller@index', 'as' => 'index' ]);

Route::get('/movie/search', ['as' => 'movies.search', 'uses' => 'Moviecotroller@search' ]);

Route::get('/movie/detail/{id}', ['as' => 'movies.detail', 'uses' => 'Moviecotroller@detail' ]);

