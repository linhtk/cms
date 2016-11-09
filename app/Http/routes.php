<?php

Route::controller('auth/password', 'Auth\PasswordController', [
    'getEmail' => 'auth.password.email',
    'getReset' => 'auth.password.reset'
]);

Route::controller('auth', 'Auth\AuthController', [
    'getLogin' => 'auth.login',
    'getLogout' => 'auth.logout'
]);

Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show']]);

Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);
Route::resource('backend/pages', 'Backend\PagesController', ['except' => ['show']]);

Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
Route::resource('backend/blog', 'Backend\BlogController');

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('backend/categories/{category}/confirm', ['as' => 'backend.categories.confirm', 'uses' => 'Backend\CategoriesController@confirm']);
Route::resource('backend/categories', 'Backend\CategoriesController');

Route::get('backend/product/{id}/confirm', ['as' => 'backend.product.confirm', 'uses' => 'Backend\ProductController@confirm']);
Route::resource('backend/product', 'Backend\ProductController');
