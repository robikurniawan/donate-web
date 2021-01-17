<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Mail\MailtrapAspirasi;
use Illuminate\Support\Facades\Mail;

Route::get('/mail', 'FrontController@sendMail')->name('mail');
Route::get('/', 'FrontController@index')->name('homepage');
Route::get('/page/info', 'FrontController@info')->name('public.info');
Route::get('/page/berita', 'FrontController@berita')->name('public.berita');
Route::get('/page/donatur', 'FrontController@donatur')->name('public.donatur');
Route::get('json/donatur', 'FrontController@jsonDonatur')->name('donatur.json-public');

Route::get('/page/disbursement', 'FrontController@disbursement')->name('public.disbursement');
Route::get('json/disbursement', 'FrontController@jsonDisbursement')->name('disbursement.json-public');



// Auth::routes(['register' => FALSE, 'login' => FALSE]);
Auth::routes( ['login' => FALSE]);

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/admin-auth', 'UsersController@isLogin')->name('admin.auth');
Route::post('/admin-logout', 'UsersController@logout')->name('admin.logout');
// endGuest


// @admin
Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    Route::prefix('donatur')->group(function () {
        Route::get('/', 'DonaturController@index')->name('donatur.index');
        Route::get('/total', 'DonaturController@totalDonasi');
        Route::get('add', 'DonaturController@create')->name('donatur.create');
        Route::post('store', 'DonaturController@store')->name('donatur.store');
        Route::get('edit/{id}', 'DonaturController@edit')->name('donatur.edit');
        Route::post('update', 'DonaturController@update')->name('donatur.update');
        Route::get('delete/{id}', 'DonaturController@destroy')->name('donatur.destroy');
        Route::get('json', 'DonaturController@json')->name('donatur.json');
    });


    Route::prefix('pengeluaran')->group(function () {
        Route::get('/', 'PengeluaranController@index')->name('pengeluaran.index');
        Route::get('add', 'PengeluaranController@create')->name('pengeluaran.create');
        Route::post('store', 'PengeluaranController@store')->name('pengeluaran.store');
        Route::get('edit/{id}', 'PengeluaranController@edit')->name('pengeluaran.edit');
        Route::post('update', 'PengeluaranController@update')->name('pengeluaran.update');
        Route::get('delete/{id}', 'PengeluaranController@destroy')->name('pengeluaran.destroy');
        Route::get('json', 'PengeluaranController@json')->name('pengeluaran.json');
    });



    Route::prefix('slide')->group(function () {
        Route::get('/', 'SlideController@index')->name('slide.index');
        Route::get('add', 'SlideController@create')->name('slide.create');
        Route::post('store', 'SlideController@store')->name('slide.store');
        Route::get('edit/{id}', 'SlideController@edit')->name('slide.edit');
        Route::post('update', 'SlideController@update')->name('slide.update');
        Route::get('delete/{id}', 'SlideController@destroy')->name('slide.destroy');
        Route::get('json', 'SlideController@json')->name('slide.json');
    });

    Route::prefix('pengaturan')->group(function () {
        Route::get('/', 'PengaturanController@index')->name('setting.index');
        Route::get('edit', 'PengaturanController@edit')->name('setting.edit');
        Route::post('update', 'PengaturanController@update')->name('setting.update');
    });


    Route::prefix('users')->group(function () {
        Route::get('/', 'UsersController@index')->name('users.index');
        Route::get('add', 'UsersController@create')->name('users.create');
        Route::post('store', 'UsersController@store')->name('users.store');
        Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
        Route::get('reset/{id}', 'UsersController@reset')->name('users.reset');
        Route::get('resetProcess', 'UsersController@resetProcess')->name('users.reset-process');
        Route::post('update', 'UsersController@update')->name('users.update');
        Route::post('updatePassword', 'UsersController@updatePassword')->name('users.update-password');
        Route::get('delete/{id}', 'UsersController@destroy')->name('users.destroy');
        Route::get('json', 'UsersController@json')->name('users.json');
    });


    //END


});
