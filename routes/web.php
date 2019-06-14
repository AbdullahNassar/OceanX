<?php

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

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/markAsRead', function(){
    Auth::guard('admins')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@getAbout']);
    Route::get('/clients', ['as' => 'site.clients', 'uses' => 'ServicesController@getService']);
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'HomeController@getContact']);
    Route::post('/send', ['as' => 'site.message', 'uses' => 'HomeController@message']);
    Route::get('/services', ['as' => 'site.services', 'uses' => 'HomeController@getServices']);
    Route::get('/initiatives', ['as' => 'site.initiatives', 'uses' => 'HomeController@getInitiatives']);
    Route::get('/consultations', ['as' => 'site.consultations', 'uses' => 'HomeController@getConsultations']);
    Route::post('/consultation', ['as' => 'site.consultation', 'uses' => 'HomeController@postConsultations']);
    Route::get('/error', ['as' => 'site.error', 'uses' => 'HomeController@error']);
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/about', ['as' => 'admin.about', 'uses' => 'AboutController@getAbout']);
        Route::post('/about', ['as' => 'admin.about.post', 'uses' => 'AboutController@updateAbout']);
        Route::get('/contacts', ['as' => 'admin.contacts', 'uses' => 'ContactsController@getContacts']);
        Route::post('/contacts', ['as' => 'admin.contacts.update', 'uses' => 'ContactsController@updateContacts']);
        Route::get('/data', ['as' => 'admin.data', 'uses' => 'DataController@getData']);
        Route::post('/data', ['as' => 'admin.data.update', 'uses' => 'DataController@updateData']);

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', ['as' => 'admin.categories', 'uses' => 'CategoriesController@getIndex']);
            Route::get('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@getAdd']);
            Route::post('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'CategoriesController@delete']);
        });
        Route::group(['prefix' => 'initiatives'], function () {
            Route::get('/', ['as' => 'admin.initiatives', 'uses' => 'InitiativesController@getIndex']);
            Route::get('/add', ['as' => 'admin.initiative.add', 'uses' => 'InitiativesController@getAdd']);
            Route::post('/add', ['as' => 'admin.initiative.add', 'uses' => 'InitiativesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.initiative.edit', 'uses' => 'InitiativesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.initiative.edit', 'uses' => 'InitiativesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.initiative.delete', 'uses' => 'InitiativesController@delete']);
        });

        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', ['as' => 'admin.sliders', 'uses' => 'SlidersController@getIndex']);
            Route::get('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@getAdd']);
            Route::post('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.slider.delete', 'uses' => 'SlidersController@delete']);
        });

        Route::group(['prefix' => 'statistics'], function () {
            Route::get('/', ['as' => 'admin.statistics', 'uses' => 'StatisticsController@getIndex']);
            Route::get('/add', ['as' => 'admin.statistic.add', 'uses' => 'StatisticsController@getAdd']);
            Route::post('/add', ['as' => 'admin.statistic.add', 'uses' => 'StatisticsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.statistic.edit', 'uses' => 'StatisticsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.statistic.edit', 'uses' => 'StatisticsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.statistic.delete', 'uses' => 'StatisticsController@delete']);
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', ['as' => 'admin.posts', 'uses' => 'PostsController@getIndex']);
            Route::get('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@getAdd']);
            Route::post('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.post.delete', 'uses' => 'PostsController@delete']);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'admin.services', 'uses' => 'ServicesController@getIndex']);
            Route::get('/add', ['as' => 'admin.service.add', 'uses' => 'ServicesController@getAdd']);
            Route::post('/add', ['as' => 'admin.service.add', 'uses' => 'ServicesController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.service.edit', 'uses' => 'ServicesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.service.edit', 'uses' => 'ServicesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.service.delete', 'uses' => 'ServicesController@delete']);
        });

        Route::group(['prefix' => 'clients'], function () {
            Route::get('/', ['as' => 'admin.clients', 'uses' => 'ClientsController@getIndex']);
            Route::get('/add', ['as' => 'admin.client.add', 'uses' => 'ClientsController@getAdd']);
            Route::post('/add', ['as' => 'admin.client.add', 'uses' => 'ClientsController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.client.edit', 'uses' => 'ClientsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.client.edit', 'uses' => 'ClientsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.client.delete', 'uses' => 'ClientsController@delete']);
        });

        Route::group(['prefix' => 'consultants'], function () {
            Route::get('/', ['as' => 'admin.consultants', 'uses' => 'ConsultantsController@getIndex']);
            Route::get('/add', ['as' => 'admin.consultant.add', 'uses' => 'ConsultantsController@getAdd']);
            Route::post('/add', ['as' => 'admin.consultant.add', 'uses' => 'ConsultantsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.consultant.edit', 'uses' => 'ConsultantsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.consultant.edit', 'uses' => 'ConsultantsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.consultant.delete', 'uses' => 'ConsultantsController@delete']);
        });

        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/index', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UsersController@getIndex']);
            Route::get('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@getAdd']);
            Route::post('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@insertUser']);
            Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@getUser']);
            Route::post('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@updateUser']);
            Route::get('/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UsersController@deleteU']);
            Route::post('/active', ['as' => 'admin.user.active', 'uses' => 'UsersController@postActive']);
            Route::post('/disActive', ['as' => 'admin.user.disActive', 'uses' => 'UsersController@postDisActive']);
            Route::post('/block', ['as' => 'admin.user.block', 'uses' => 'UsersController@postBlock']);
        });
        Route::get('/message', ['as' => 'admin.message', 'uses' => 'MessageController@getIndex']);
        Route::get('/consultation', ['as' => 'admin.consultation', 'uses' => 'MessageController@getConsultations']);
        Route::get('/consults', ['as' => 'admin.consults', 'uses' => 'MessageController@getIndex']);
        Route::get('/reservation', ['as' => 'admin.reservation', 'uses' => 'ReservationController@getIndex']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploadIcon', ['as' => 'admin.upload.icon', 'uses' => 'UploadController@getPost2']);
        Route::post('/uploadImage', ['as' => 'admin.upload.image', 'uses' => 'UploadController@getPost3']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});