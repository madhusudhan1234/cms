<?php


Route::controller('auth/password','Auth\PasswordController',[
    'getEmail' => 'auth.password.email',
    'getReset' => 'auth.password.reset'
]);

Route::controller('auth','Auth\AuthController',[
   'getLogin' => 'auth.login', 
    'getLogout' => 'auth.logout'
]);

Route::get('backend/dashboard',['as' => 'backend.dashboard','uses' => 'Backend\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
