<?php


// +===================================+
// | User Login Information |
// +===================================+

Route::group(['middleware' => 'auth'], function () {


});
Route::get("/","HomeController@index")->name("/");
Route::get("login","HomeController@login")->name("sign-in");
Route::get("register","HomeController@register")->name("sign-up");


//Route::get('clear', 'DashboardController@All_clear');


$this->get('doadmin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post("user-login","AuthLoginController@login")->name("user.login");
Route::post('user-logout', 'AuthLoginController@logout')->name("user.logout");
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');









