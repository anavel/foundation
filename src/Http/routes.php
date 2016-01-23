<?php

Route::group(
    [
        'prefix'     => config('anavel.route_prefix'),
        'namespace'  => 'Anavel\Foundation\Http\Controllers'
    ],
    function () {
        Route::get('login', ['as' => 'anavel.login', 'uses' => 'DefaultController@login']);
    }
);

Route::group(
    [
        'prefix'     => config('anavel.route_prefix'),
        //'middleware' => config('anavel.auth_middleware'),
        'namespace'  => 'Anavel\Foundation\Http\Controllers'
    ],
    function () {
        Route::get('/', ['as' => 'anavel.dashboard', 'uses' => 'DefaultController@index']);
    }
);
