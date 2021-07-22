<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'EventController@index');
Route::get('/details/{event}/show', 'EventController@show');
Route::get('/login', 'pagesController@login');
Route::get('/admin', 'pagesController@admin');
Route::get('/user', 'pagesController@user');

Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function ()
{
    // Route::get('/admin_index/tester', 'AdminController@runUpdateEO');

	Route::get('/admin_index', 'AdminController@index')->name('admin_index');
    Route::get('/admin_eo/waiting', 'AdminController@eo_waiting')->name('admin_eo_waiting');
    Route::get('/admin_eo/confirmed', 'AdminController@eo_confirmed')->name('admin_eo_confirmed');
    Route::get('/admin_eo/rejected', 'AdminController@eo_rejected')->name('admin_eo_rejected');

    Route::get('/admin_eo/waiting/{e_organizer}/confirm', 'AdminController@confirmEO');
    Route::get('/admin_eo/waiting/{e_organizer}/reject', 'AdminController@rejectEO');
    Route::delete('/admin_eo/waiting/{e_organizer}/destroy', 'AdminController@destroyEO');
    Route::delete('/admin_eo/confirmed/{e_organizer}/destroy', 'AdminController@destroyEO');
    Route::delete('/admin_eo/rejected/{e_organizer}/destroy', 'AdminController@destroyEO');

    Route::get('/admin_events/waiting', 'AdminController@events_waiting')->name('admin_events_waiting');
    Route::get('/admin_events/available', 'AdminController@events_available')->name('admin_events_available');
    Route::get('/admin_events/disable', 'AdminController@events_disable')->name('admin_events_disable');
    Route::get('/admin_events/rejected', 'AdminController@events_rejected')->name('admin_events_rejected');

    Route::get('/admin_events/waiting/{event}/confirm', 'AdminController@confirmEvent');
    Route::get('/admin_events/waiting/{event}/reject', 'AdminController@rejectEvent');
    Route::delete('/admin_events/waiting/{event}/destroy', 'AdminController@destroyEvent');

    Route::get('/admin_events/available/{event}/disable', 'AdminController@disableEvent');
    Route::delete('/admin_events/available/{event}/destroy', 'AdminController@destroyEvent');

    Route::get('/admin_events/disable/{event}/enable', 'AdminController@enableEvent');
    Route::delete('/admin_events/disable/{event}/destroy', 'AdminController@destroyEvent');

    Route::delete('/admin_events/rejected/{event}/destroy', 'AdminController@destroyEvent');

});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,user,eo']], function ()
{
    Route::get('/index', 'EventController@index')->name('indexUser');
    Route::get('/history', 'EventController@history')->name('history');
    Route::get('/ticket', 'EventController@ticket')->name('ticket');
    // Route::get('/myticket', 'UserTicketController@index')->name('myticket');
    Route::get('/mytransaction', 'UserTransactionController@index')->name('mytransaction');
    Route::get('/myprofile', 'UserProfileController@index')->name('myprofile');
    Route::get('/event', 'EventController@index')->name('event');

    Route::get('/profile', 'UserProfileController@index')->name('profileUser');

    Route::post('/details/{event}/show/checkout', 'EventController@checkout');

    Route::get('/checkout/{transaction}/payment', 'CheckoutController@showPayment');

    Route::patch('/checkout/{transaction}/payment', 'CheckoutController@updatePayment');
});

Route::group(['middleware' => ['auth', 'checkRole:eo']], function ()
{
    Route::get('/eo_index', 'EOController@index')->name('indexEo');
    Route::get('/eo_profile', 'EOController@profile')->name('profile.eo');
    Route::patch('/eo_profile/{e_organizer}/update_p_eo', 'EOController@profileEoUpdate');

    //event crud
    Route::get('/eo_event', 'EOController@event')->name('eventEo');
    Route::post('/eo_event', 'EOController@store')->name('eventPostEo');
    Route::post('/eo_event/{event}/update', 'EOController@update');
    Route::delete('/eo_event/{event}/destroy', 'EOController@destroy');
    
    //event disable enable
    Route::get('/eo_event/{event}/disable', 'EOController@disable');
    Route::get('/eo_event/{event}/enable', 'EOController@enable');

    //ticket crud
    Route::get('/eo_ticket', 'TicketController@index')->name('ticketEo');
    Route::get('/eo_ticket/all', 'TicketController@all')->name('eo_ticket.all');
    Route::get('/eo_ticket/{event}/detail', 'TicketController@detail');
    // Route::get('/eo_ticket/{ticket}/detail', 'TicketController@detail');
    Route::post('/eo_ticket', 'TicketController@store')->name('ticketPostEo');
    // Route::get('/eo_ticket/{ticket}/edit', 'TicketController@show');
    Route::post('/eo_ticket/{ticket}/update', 'TicketController@update');
    Route::delete('/eo_ticket/{ticket}/destroy', 'TicketController@destroy');

    //ticket disable enable
    Route::get('/eo_ticket/{ticket}/disable', 'TicketController@disable');
    Route::get('/eo_ticket/{ticket}/enable', 'TicketController@enable');

});

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/signup', 'AuthController@signup')->name('signup');
Route::get('/signupeo', 'AuthController@signupEo')->name('signupeo');
Route::post('/postlogin', 'AuthController@postlogin')->name('postlogin');
Route::post('/postsignup', 'AuthController@postsignup')->name('postsignup');
Route::post('/postlogineo', 'AuthController@postlogineo')->name('postlogin_eo');
Route::post('/postsignupeo', 'AuthController@postsignupeo')->name('postsignupeo');
Route::get('/submitResponse', 'AuthController@submitResponse')->name('submit_response_eo');



//katon


// Route::get('/login', function () {
//     return view('auth/login');
// })->name('signup');

// Route::get('/signup', function () {
//     return view('auth/signup');
// })->name('signup');
