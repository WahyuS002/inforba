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

Route::get('/', 'PagesController@home')->name('public.home');
Route::get('/event-detail/{event}', 'PagesController@eventDetail')->name('public.event-detail');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/callback-tripay', 'TripayController@callback');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/event', 'EventController@index')->name('app.event');
    Route::get('/event-create', 'EventController@create')->name('app.event.create');
    Route::get('/event-registration/{event}', 'EventController@registration')->name('app.event.registration');
    Route::get('/event-payment/{event}', 'EventController@payment')->name('app.event.payment');

    Route::post('/event-user-registration/{event}', 'EventController@userRegistration')->name('user.registration');

    Route::get('/notifications', 'DashboardController@notifications')->name('notifications');
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
