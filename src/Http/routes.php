<?php

Route::group(
    [
        'prefix'     => config('adoadomin.route_prefix'),
        'namespace'  => 'ANavallaSuiza\Adoadomin\Http\Controllers'
    ],
    function () {
        Route::get('login', ['as' => 'adoadomin.login', 'uses' => 'DefaultController@login']);
    }
);

Route::group(
    [
        'prefix'     => config('adoadomin.route_prefix'),
        //'middleware' => config('adoadomin.auth_middleware'),
        'namespace'  => 'ANavallaSuiza\Adoadomin\Http\Controllers'
    ],
    function () {
        Route::get('/', ['as' => 'adoadomin.dashboard', 'uses' => 'DefaultController@index']);
    }
);
