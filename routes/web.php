<?php


// +===================================+
// | User Login Information |
// +===================================+

Route::group(['middleware' => 'auth'], function () {
    //my-events page
    Route::get("user-setting","HomeController@user_setting")->name("UserSetting");
    Route::get("my-events","EventControler@show_my_events")->name("MyEvents");
    Route::get("add-events","EventControler@show_event_form")->name("AddEvent");
    Route::post("insert-event","EventControler@create_event")->name("createEvent");
    Route::get("event-details","EventControler@event_detail")->name("EventDetails");
    Route::get("withdraw","WithdrawController@withdraw")->name("Withdraw");

    Route::get("event-setup/{id}/{page?}","EventControler@event_setup_view")->name("event_setup");



});
Route::get("/","HomeController@index")->name("/");
//Route::get("login","HomeController@login")->name("sign-in");
Route::get('clear', 'DashboardController@All_clear');


//login form
Route::get('sign-in', 'Auth\LoginController@showLoginForm')->name('login');
//register form
Route::get("sign-up","Auth\LoginController@showRegistarForm")->name("sign-up");
//login action
Route::post("user-login","AuthLoginController@login")->name("user.login");
//register action
Route::post("user-register","AuthLoginController@register")->name("user.register");
//user Logout action
Route::post('user-logout', 'AuthLoginController@logout')->name("user.logout");

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');









