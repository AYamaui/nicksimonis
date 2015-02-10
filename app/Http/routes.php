<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

get('/', 'IndexController@index');
get('photos/{id}', 'IndexController@photos');
post('contact', 'IndexController@contact');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'admin/series' => 'Admin\SeriesController',
    'admin/configurations' => 'Admin\ConfigurationsController',
]);
