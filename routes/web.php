<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Artisan group
Route::prefix('artisan')
    ->group(function () {

        //---------------------config---------------------//
        Route::get('/config/cache', 'ArtisanController@configCache');
        Route::get('/config/clear', 'ArtisanController@configClear');

        //---------------------route---------------------//
        Route::get('/route/cache', 'ArtisanController@routeCache');
        Route::get('/route/clear', 'ArtisanController@routeClear');

        //---------------------cache---------------------//
        Route::get('/cache/clear', 'ArtisanController@cacheClear');

        //---------------------view---------------------//
        Route::get('/view/cache', 'ArtisanController@viewCache');
        Route::get('/view/clear', 'ArtisanController@viewClear');

        //---------------------optimize---------------------//
        Route::get('/optimize', 'ArtisanController@optimize');
        Route::get('/optimize/clear', 'ArtisanController@optimizeClear');

        //---------------------storage-link---------------------//
        Route::get('/storage/link', 'ArtisanController@storageLink');
    });

// Главная
Route::group([
    'middleware' => 'admin',
], function () {
    Route::get('/', 'Admin\HomeController@home')->name('home');
});


// Frontend group
Route::namespace('Frontend')
    ->group(function () {
        Route::group([
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function () {
            Route::get('/', 'HomeController@home')->name('home');
            Route::get('/catalog/{slug?}', 'HomeController@catalog')->name('catalog');
            Route::get('/products/{slug}', 'HomeController@product')->name('product');
            Route::get('/about-us', 'HomeController@about')->name('about');
            Route::get('/news', 'HomeController@news')->name('news');
            Route::get('/news/{slug}', 'HomeController@new')->name('new');
            Route::get('/contacts', 'HomeController@contacts')->name('contacts');
            // ajax
            Route::get('/get-basket-items', 'HomeController@getBasketItems')->name('get-basket-items');
        });
        Route::post('/feedback', 'HomeController@feedback')->name('feedback');
        Route::post('/order', 'HomeController@order')->name('order');
    });

// Admin group
Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::group([
            'middleware' => 'guest',
        ], function () {
            Route::get('/login', 'AuthController@showLogin')->name('login.show');
            Route::post('/login', 'AuthController@postLogin')->name('login.post');
        });

        Route::group([
            'middleware' => 'admin'
        ], function () {
            Route::post('logout', 'HomeController@logout')->name('logout');
            Route::post('destroy/image', 'HomeController@destroyImage')->name('destroy-image');

            // Главная
            Route::get('/', 'HomeController@home')->name('home');

            // Пользователи
            Route::get('users/', 'UserController@index')->name('user.index');
            Route::get('users/form/{id?}', 'UserController@form')->name('user.form');
            Route::post('users/form/{id?}', 'UserController@post')->name('user.post');
            Route::delete('users/{id}', 'UserController@destroy')->name('user.destroy');
        });
    });

/*--------------------------------------------------------------------------------
    Feedback ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/feedback')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'FeedbackController@index')->name('admin.feedback.index');
        Route::get('/{id}', 'FeedbackController@show')->name('admin.feedback.show');
        Route::delete('/{id}', 'FeedbackController@destroy')->name('admin.feedback.destroy');
    });
});
/*--------------------------------------------------------------------------------
    Feedback ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Post ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/posts')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'PostController@index')->name('admin.posts.index');
        Route::delete('/{id}', 'PostController@destroy')->name('admin.posts.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/posts')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'PostController@create')->name('admin.posts.create');
            Route::post('/', 'PostController@store')->name('admin.posts.store');
            Route::get('/{id}/edit', 'PostController@edit')->name('admin.posts.edit');
            Route::post('/{id}', 'PostController@update')->name('admin.posts.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Post ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Stock ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/stocks')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'StockController@index')->name('admin.stocks.index');
        Route::delete('/{id}', 'StockController@destroy')->name('admin.stocks.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/stocks')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'StockController@create')->name('admin.stocks.create');
            Route::post('/', 'StockController@store')->name('admin.stocks.store');
            Route::get('/{id}/edit', 'StockController@edit')->name('admin.stocks.edit');
            Route::post('/{id}', 'StockController@update')->name('admin.stocks.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Stock ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Faq ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/faqs')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'FaqController@index')->name('admin.faqs.index');
        Route::delete('/{id}', 'FaqController@destroy')->name('admin.faqs.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/faqs')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'FaqController@create')->name('admin.faqs.create');
            Route::post('/', 'FaqController@store')->name('admin.faqs.store');
            Route::get('/{id}/edit', 'FaqController@edit')->name('admin.faqs.edit');
            Route::post('/{id}', 'FaqController@update')->name('admin.faqs.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Faq ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Advantages ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/advantages')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'AdvantageController@index')->name('admin.advantages.index');
        Route::delete('/{id}', 'AdvantageController@destroy')->name('admin.advantages.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/advantages')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'AdvantageController@create')->name('admin.advantages.create');
            Route::post('/', 'AdvantageController@store')->name('admin.advantages.store');
            Route::get('/{id}/edit', 'AdvantageController@edit')->name('admin.advantages.edit');
            Route::post('/{id}', 'AdvantageController@update')->name('admin.advantages.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Advantages ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Setting ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/settings')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'SettingController@index')->name('admin.settings.index');
        Route::get('/create', 'SettingController@create')->name('admin.settings.create');
        Route::post('/', 'SettingController@store')->name('admin.settings.store');
        Route::get('/{id}/edit', 'SettingController@edit')->name('admin.settings.edit');
        Route::post('/{id}', 'SettingController@update')->name('admin.settings.update');
        Route::delete('/{id}', 'SettingController@destroy')->name('admin.settings.destroy');
    });
});
/*--------------------------------------------------------------------------------
    Setting ROUTES  => END
--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------
    Banner ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/banners')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'BannerController@index')->name('admin.banners.index');
        Route::delete('/{id}', 'BannerController@destroy')->name('admin.banners.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/banners')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'BannerController@create')->name('admin.banners.create');
            Route::post('/', 'BannerController@store')->name('admin.banners.store');
            Route::get('/{id}/edit', 'BannerController@edit')->name('admin.banners.edit');
            Route::post('/{id}', 'BannerController@update')->name('admin.banners.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Banner ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Category ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/categories')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories.index');
        Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('/', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
        Route::post('/nestable', 'CategoryController@nestable')->name('admin.categories.nestable');
        Route::post('/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::delete('/{id}', 'CategoryController@destroy')->name('admin.categories.destroy');
    });
});
/*--------------------------------------------------------------------------------
    Category ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Brand ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/brands')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'BrandController@index')->name('admin.brands.index');
        Route::get('/create', 'BrandController@create')->name('admin.brands.create');
        Route::post('/', 'BrandController@store')->name('admin.brands.store');
        Route::get('/{id}/edit', 'BrandController@edit')->name('admin.brands.edit');
        Route::post('/nestable', 'BrandController@nestable')->name('admin.brands.nestable');
        Route::post('/{id}', 'BrandController@update')->name('admin.brands.update');
        Route::delete('/{id}', 'BrandController@destroy')->name('admin.brands.destroy');
    });
});
/*--------------------------------------------------------------------------------
    Brand ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Review ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/reviews')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'ReviewController@index')->name('admin.reviews.index');
        Route::delete('/{id}', 'ReviewController@destroy')->name('admin.reviews.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/reviews')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'ReviewController@create')->name('admin.reviews.create');
            Route::post('/', 'ReviewController@store')->name('admin.reviews.store');
            Route::get('/{id}/edit', 'ReviewController@edit')->name('admin.reviews.edit');
            Route::post('/{id}', 'ReviewController@update')->name('admin.reviews.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Review ROUTES  => END
--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------
    Team ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/teams')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'TeamController@index')->name('admin.teams.index');
        Route::delete('/{id}', 'TeamController@destroy')->name('admin.teams.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/teams')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'TeamController@create')->name('admin.teams.create');
            Route::post('/', 'TeamController@store')->name('admin.teams.store');
            Route::get('/{id}/edit', 'TeamController@edit')->name('admin.teams.edit');
            Route::post('/{id}', 'TeamController@update')->name('admin.teams.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Team ROUTES  => END
--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------
    Product ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/products')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::delete('/{id}', 'ProductController@destroy')->name('admin.products.destroy');
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('admin/products')->namespace('Admin')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/create', 'ProductController@create')->name('admin.products.create');
            Route::post('/', 'ProductController@store')->name('admin.products.store');
            Route::get('/{id}/edit', 'ProductController@edit')->name('admin.products.edit');
            Route::post('/{id}', 'ProductController@update')->name('admin.products.update');
        });
    });
});
/*--------------------------------------------------------------------------------
    Product ROUTES  => END
--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------
    ProductPhoto States ROUTES  => START
--------------------------------------------------------------------------------*/
Route::prefix('admin/products/{product_id}/photos')->namespace('Admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'ProductPhotoController@index')->name('admin.product-photos.index');
        Route::get('/create', 'ProductPhotoController@create')->name('admin.product-photos.create');
        Route::post('/', 'ProductPhotoController@store')->name('admin.product-photos.store');
        Route::get('/{id}/edit', 'ProductPhotoController@edit')->name('admin.product-photos.edit');
        Route::post('/{id}', 'ProductPhotoController@update')->name('admin.product-photos.update');
        Route::delete('/{id}', 'ProductPhotoController@destroy')->name('admin.product-photos.destroy');
    });
});
/*--------------------------------------------------------------------------------
    ProductPhoto States ROUTES  => END
--------------------------------------------------------------------------------*/
