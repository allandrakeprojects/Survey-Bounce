<?php

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/', 'HomeController@index');




Route::post('/do-login', 'Auth\LoginController@custom_login');
Route::get('/do-logout', 'Auth\LoginController@custom_logout');
Route::get('/sign-up/{username?}', 'Auth\RegisterController@sign_up');
Route::post('/do-register', 'Auth\RegisterController@custom_register');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/dashboard/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/offer-wall', 'HomeController@offer_wall_listing');
Route::get('/taskwall', 'HomeController@offer_wall_listing')->name('taskwall');
Route::get('/reviewwall', 'HomeController@reviewwall');
Route::get('/refer', 'HomeController@refer_page');
Route::get('/chat', 'HomeController@chat');
Route::get('/promo', 'HomeController@promo')->name('promo');
Route::get('/youtube', 'HomeController@youtube');
Route::post('/youtube-video-submit', 'HomeController@youtube_video_submit');
Route::get('/facebook', 'HomeController@facebook');
Route::get('/facebook-post', 'HomeController@facebook_post');
Route::get('/account', 'HomeController@account')->name('account');
Route::get('/payments', 'HomeController@payments');
Route::get('/rewards', 'HomeController@rewards');
Route::get('/cashout', 'HomeController@cashout');
Route::get('/help', 'HomeController@help');
Route::get('/instagram', 'HomeController@instagram');
Route::post('/instagram-submit', 'HomeController@instagram_submit');
Route::get('/tiktok', 'HomeController@tiktok');
Route::post('/tiktok-submit', 'HomeController@tiktok_submit');



Route::get('/about-us', 'HomeController@about_us');
Route::get('/contact-us', 'HomeController@contact_us');
Route::post('/contact-us-submit', 'HomeController@contact_us_submit');
Route::get('/payment-proofs', 'HomeController@payment_proofs');
Route::get('/video-testimonials', 'HomeController@video_testimonials');
Route::get('/faq-2', 'HomeController@faq_2');
Route::get('/terms', 'HomeController@terms');
Route::get('/privacy-policy-2', 'HomeController@privacy_policy');


Route::middleware(['auth'])->group(function () {


    //

    Route::post('/user/update-bio', 'UserController@update_bio');
    Route::post('/user/avatar-update', 'UserController@avatar_update');
    Route::post('/user/change-password', 'UserController@change_password');
// user/change_password



/*
---------------     HOME
*/

// finance/transaction/journal

Route::get('/finance/transaction/journal', 'Finance\TransactionController@journal_view');



// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/finance/accounts/add', 'Finance\AccountsController@account_add');
Route::post('/finance/accounts/store', 'Finance\AccountsController@store');

//account_edit
Route::get('/finance/accounts/edit', 'Finance\AccountsController@edit');
Route::post('/finance/accounts/update', 'Finance\AccountsController@update');



Route::get('/finance/accounts', 'Finance\AccountsController@accounts_lists');
Route::get('/finance/accounts/detail/{id}', 'Finance\AccountsController@account_detail');
Route::get('/finance/transaction/add', 'Finance\TransactionController@trans_add');
Route::post('/finance/transaction/save', 'Finance\TransactionController@submit_data');
//
Route::get('/finance/transaction/edit/{id}', 'Finance\TransactionController@trans_edit');
Route::post('/finance/transaction/update', 'Finance\TransactionController@trans_update');

Route::get('/finance/transaction/delete/{id}', 'Finance\TransactionController@trans_delete');


Route::get('/get-account', 'Finance\AccountsController@searchAccount');

// LedgerController/
Route::get('/finance/ledger/{id}', 'Finance\LedgerController@account_ledger');

// trail balance
Route::get('/finance/trial-balance', 'Finance\TrialBalanceController@trial_balance');


Route::get('/update_account_balance/{id}', 'Finance\TrialBalanceController@update_account_balance');

});

Auth::routes();
