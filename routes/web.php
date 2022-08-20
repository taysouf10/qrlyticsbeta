<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {

    Route::get('/compaigns/{compaign}/links', '\App\Http\Controllers\LinkController@index')->name('links');
    Route::get('/links', '\App\Http\Controllers\LinkController@showall')->name('links');
    Route::get('/compaigns/{compaign}/links/new', '\App\Http\Controllers\LinkController@create');
    Route::post('/compaigns/{compaign}/links/new', '\App\Http\Controllers\LinkController@store');
    Route::get('/compaigns/{compaign}/links/{link}', '\App\Http\Controllers\LinkController@edit');
    Route::get('/compaigns/{compaign}/links/{link}/details', '\App\Http\Controllers\LinkController@show');
    Route::post('/compaigns/{compaign}/links/{link}', '\App\Http\Controllers\LinkController@update');
    Route::delete('/compaigns/{compaign}/links/{link}', '\App\Http\Controllers\LinkController@destroy');

    Route::get('/compaigns', '\App\Http\Controllers\CompaignController@index')->name('compaigns');
    Route::get('/compaigns/new', '\App\Http\Controllers\CompaignController@create');
    Route::post('/compaigns/new', '\App\Http\Controllers\CompaignController@store');
    Route::get('/compaigns/{compaign}', '\App\Http\Controllers\CompaignController@edit');
    Route::post('/compaigns/{compaign}', '\App\Http\Controllers\CompaignController@update');
    Route::delete('/compaigns/{compaign}', '\App\Http\Controllers\CompaignController@destroy');

    Route::get('/settings', '\App\Http\Controllers\UserController@edit');
    Route::post('/settings', '\App\Http\Controllers\UserController@update');

});

// Route::post('/visit/{compaign}/{link}', '\App\Http\Controllers\VisitController@store');
Route::get('/visit/{compaign}/{link}', '\App\Http\Controllers\VisitController@store');

Route::get('{user}', '\App\Http\Controllers\UserController@show');

