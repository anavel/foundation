<?php

Route::group(
    [
        'prefix'     => config('anavel.route_prefix'),
        'namespace'  => 'Anavel\Foundation\Http\Controllers'
    ],
    function () {
        Route::get('auth/login', ['as' => 'anavel.login', 'uses' => 'AuthController@getLogin']);
        Route::post('auth/login', ['as' => 'anavel.login.post', 'uses' => 'AuthController@postLogin']);
        Route::get('auth/logout', ['as' => 'anavel.logout', 'uses' => 'AuthController@getLogout']);
    }
);

Route::group(
    [
        'prefix'     => config('anavel.route_prefix'),
        //'middleware' => 'anavel.auth',
        'namespace'  => 'Anavel\Foundation\Http\Controllers'
    ],
    function () {
        Route::get('/', ['as' => 'anavel.dashboard', 'uses' => 'DefaultController@index']);
    }
);
