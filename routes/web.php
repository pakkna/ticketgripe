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
    Route::get("withdraw","WithdrawController@withdraw")->name("Withdraw");

    Route::get("event-setup/{id}/{page?}","EventControler@event_setup_view")->name("event_setup");

    Route::get("delete-event/{id}","EventControler@delete_event")->name("delete-event");
    Route::post("order_form_select","EventControler@order_form_select");

    Route::post("all-tickets","TicketController@all_ticket")->name("all_ticket_datatable");

    Route::post("create-tickets","TicketController@create_tickets")->name("create_tickets");

    Route::post("ticket-delete","TicketController@ticket_delete")->name("ticket_delete");
    Route::post("modal-edit-ticket","TicketController@edit_ticket")->name("edit-ticket");
    Route::post("action-edit-ticket","TicketController@action_edit_ticket")->name("action-edit-ticket");
    Route::get("checkout","TicketController@buy_ticket")->name("TicketOrder");


    Route::post("ticket-question-add","OrderController@ticket_questoion_add")->name("ticket-question-add");
    Route::post("all-orders","OrderController@all_order")->name("all_order_datatable");
    Route::get("order-form","OrderController@order_form")->name("order_form_datatable");
    Route::post("ticket-toggle","OrderController@ticket_toggle");
    Route::post("ticket-question-update","OrderController@ticket_update_html")->name("modal-edit-ticket-question");
    Route::post("ticket-question-edit","OrderController@ticket_question_edit")->name("ticket-question-edit");
    Route::post("order_datatable_form","OrderController@order_datatable_form")->name("order_datatable_form");
    Route::post("attendee_datatable_form","OrderController@attendee_datatable_form")->name("attendee_datatable_form");
    Route::post("confirm-order-user","OrderController@confirm_order_user");

    Route::post("add-sponser","SponserController@add_sponser")->name("add-sponser");
    Route::post("all-sponser","SponserController@all_sponsers")->name("all-sponser");
    Route::post("sponser-delete","SponserController@sponser_delete")->name("sponser-delete");

    Route::post("question-delete","OrderController@order_question_delete")->name("question-delete");
    Route::post("modal-view-order","OrderController@modal_view_order");

    Route::post("all-attendee","AttendeeController@all_attendee")->name("all_attendee_datatable");


    Route::get("event-details/{event_id}","EventControler@event_detail")->name("EventDetails");
    Route::get("demo-ticket/{event_id}/{ticket_id}","TicketController@ticket_detail");
    Route::get("qrcode","OrderController@qr_generate");
});

Route::post("buy-ticket","PaymentController@ticket_generate")->name("ticket-generate");
Route::any("payment_status","PaymentController@payment_status");
Route::get("buy-ticket/{event_id}","EventControler@event_ticket")->name("Buyticket");
Route::post("buy-ticket-option","EventControler@buy_ticket_option");
Route::get("e/{event_link}","EventControler@event_details_for_all");


    //login form
    Route::get('sign-in', 'Auth\LoginController@showLoginForm')->name('login');
    //register form
    Route::get("sign-up","Auth\LoginController@showRegistarForm")->name("sign-up");

    Route::get("ticket-view/{tran_id}/{event_id}/{ticket_id}/{random_number}","PaymentController@ticket_view");


Route::get("/","HomeController@index")->name("/");

Route::get('clear', 'HomeController@All_clear');



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









