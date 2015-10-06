<?php

Route::group(
    [
        'prefix'     => config('adoadomin.route_prefix'),
        //'middleware' => config('adoadomin.auth.middleware'),
        'namespace'  => 'ANavallaSuiza\Adoadomin\Http\Controllers'
    ],
    function () {
        Route::get('/', ['as' => 'adoadomin.dashboard', 'uses' => 'HomeController@index']);
    }
);
