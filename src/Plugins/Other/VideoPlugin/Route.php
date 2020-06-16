<?php
/**
 * Route front
 */
if(sc_config('TigresaTemplate')) {
Route::group(
    [
        'prefix'    => 'plugin/tigresatemplate',
        'namespace' => 'App\Plugins\Other\TigresaTemplate\Controllers',
    ],
    function () {
        Route::get('paypal', 'FrontController@index')
        ->name('tigresatemplate.index');
    }
);
}
/**
 * Route admin
 */
Route::group(
    [
        'prefix' => SC_ADMIN_PREFIX.'/tigresatemplate',
        'middleware' => SC_ADMIN_MIDDLEWARE,
        'namespace' => 'App\Plugins\Other\TigresaTemplate\Admin',
    ], 
    function () {
        Route::get('/', 'AdminController@index')
        ->name('admin_tigresatemplate.index');
    }
);
