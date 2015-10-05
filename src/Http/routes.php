<?php

Route::group(
    [
        'prefix' => config('adoadomin.route_prefix'),
        'namespace' => 'ANavallaSuiza\Adoadomin\Http\Controllers'
    ],
    function () {
        Route::get('/', ['as' => 'adoadomin.dashboard', 'uses' => 'HomeController@index']);
    }
);
