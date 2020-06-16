<?php
/**
 * Route front
 */
if(sc_config('VideoPlugin')) {
Route::group(
    [
        'prefix'    => 'plugin/videoplugin',
        'namespace' => 'App\Plugins\Other\VideoPlugin\Controllers',
    ],
    function () {
        Route::get('index', 'FrontController@index')
        ->name('videoplugin.index');
    }
);
}
/**
 * Route admin
 */
Route::group(
    [
        'prefix' => SC_ADMIN_PREFIX.'/videoplugin',
        'middleware' => SC_ADMIN_MIDDLEWARE,
        'namespace' => 'App\Plugins\Other\VideoPlugin\Admin',
    ], 
    function () {
        Route::get('/', 'AdminController@index')
        ->name('admin_videoplugin.index');
    }
);
