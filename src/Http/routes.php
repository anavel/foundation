<?php

Route::group(
    [
        'prefix'    => config('anavel.route_prefix'),
        'namespace' => 'Anavel\Foundation\Http\Controllers',
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
        'middleware' => 'anavel.auth',
        'namespace'  => 'Anavel\Foundation\Http\Controllers',
    ],
    function () {
        Route::get('/', ['as' => 'anavel.dashboard', 'uses' => 'DefaultController@index']);

        Route::get('/profile/{id}', [
            'as'   => 'anavel.profile.edit',
            'uses' => function ($id) {
                return redirect()->route(config('anavel.profile_edit_route'), [config('anavel.profile_model_slug'), $id]);
            },
        ]);

        Route::get('/ckeditor/embed/provider', [
            'as'   => 'anavel.ckeditor.embed-provider',
            'uses' => 'CkEditorController@embedProvider',
        ]);
    }
);
