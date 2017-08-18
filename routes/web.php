<?php

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

use App\Status;
use App\Ticket;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function(){


    $error_types = [

        'Typo/Misspelling',
        'Broken link',
        'Factual error',
        'Problems accessing or viewing the page',
        'Other'
    ];

    $operating_systems = [
        'Windows 7',
        'Windows 8 and 8.1',
        'Windows 10',
        'Windows Vista',
        'Linux',
        'macOS X'
    ];

    $tickets = Ticket::all();
    $statuses = Status::all();

    return view('admin.index', compact('tickets','statuses', 'error_types', 'operating_systems'));


});

Route::get('/admin/edit', function(){

    return view('admin.edit');

});

Route::get('/user/faq', function(){
    $tickets = Ticket::all()->take(10);
//    $statuses = Status::all();
//
//    foreach($statuses as $status){
//        echo $status->name . '<br>';
//    }
        return view('user.faq_page', compact('tickets'));
//    return $statuses;

});

Route::resource('/tickets', 'TicketsController');
Route::resource('/comments', 'CommentsController');

Route::group(['middleware'=>'web'], function(){

    Route::get('/user', 'TicketsController@index');

});


//Route::get('/ticket/status', function(){
//
//    $ticket = Ticket::find(1);
//
//    return $ticket->status->name;
//
//});