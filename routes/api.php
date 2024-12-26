<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*--------------------------------------------------------------------------------
    1C Integration ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('v1')->group(function () {
    Route::prefix('integration')->group(function () {
        Route::middleware([])->group(function () {
            Route::post('products', 'Api\v1\Integration\IndexController@products');
            Route::post('products-update', 'Api\v1\Integration\IndexController@productsUpdate');
        });
    });
});
/*--------------------------------------------------------------------------------
    1C Integration ROUTES  => END
--------------------------------------------------------------------------------*/
