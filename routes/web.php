<?php


// +===================================+
// | User Login Information |
// +===================================+

Route::group(['middleware' => 'auth'], function () {
    //my-events page
    Route::get("pay","PayOrderController@store")->name("demo");
    Route::get("demo","HomeController@demo_view")->name("demo");
    Route::get("demo_order","HomeController@demo_order_view")->name("demo");
    Route::get("demo_order_form","HomeController@demo_order_q")->name("demo");
    Route::get("user-setting/{page?}","HomeController@user_setting")->name("UserSetting");
    Route::post("basic-info","HomeController@edit_basic_info")->name("BasicInfo");
    Route::post("basic-info2","HomeController@edit_user_avatar")->name("UserAvatarCng");
    Route::post("basic-info3","HomeController@edit_user_email")->name("UserEmailCng");
    Route::post("basic-info4","HomeController@edit_user_pass")->name("UserpassCng");
    Route::get("my-events","EventControler@show_my_events")->name("MyEvents");
    Route::get("add-events","EventControler@show_event_form")->name("AddEvent");
    Route::post("insert-event","EventControler@create_event")->name("createEvent");
    Route::post("edit-event","EventControler@edit_event")->name("edit-event");
    Route::get("event-details","EventControler@event_detail")->name("EventDetails");
    Route::get("withdraw","WithdrawController@withdraw")->name("Withdraw");

    Route::get("event-setup/{id}/{page?}","EventControler@event_setup_view")->name("event_setup");

    Route::get("delete-event/{id}","EventControler@delete_event")->name("delete-event");

    Route::get("all-tickets","TicketController@all_ticket")->name("all_ticket_datatable");

    Route::post("create-tickets","TicketController@create_tickets")->name("create_tickets");

    Route::post("ticket-delete","TicketController@ticket_delete")->name("ticket_delete");
    Route::post("modal-edit-ticket","TicketController@edit_ticket")->name("edit-ticket");
    Route::post("action-edit-ticket","TicketController@action_edit_ticket")->name("action-edit-ticket");

    Route::post("ticket-question-add","OrderController@ticket_questoion_add")->name("ticket-question-add");
    Route::get("all-orders","OrderController@all_order")->name("all_order_datatable");
    Route::get("order-form","OrderController@order_form")->name("order_form_datatable");
    Route::post("ticket-toggle","OrderController@ticket_toggle");

    Route::get("all-attendee","AttendeeController@all_attendee")->name("all_attendee_datatable");


    

});
Route::get("/","HomeController@index")->name("/");

Route::get('clear', 'HomeController@All_clear');


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









