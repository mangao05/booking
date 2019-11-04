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

Route::get('/', 'ListOfRoomsController@footerSampleRoom');

// Route::get('/', function () {
//     return view('sample');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin',function(){
    return view('layouts.admin');
});

// Room and booking
Route::resource('room', 'RoomController');
Route::get('allinreserved','ReservationController@reserved');
Route::get('bookedclient','ReservationController@booked');
Route::resource('reservation', 'ReservationController', ['except' => 'show']);
Route::get('reservation/{id}/{checkIn}/{checkOut}', 'ReservationController@show')->name('reservation.show');
Route::post('room/getRoom', 'RoomController@getRoomDetails')->name('room.getRoomDetails');
Route::get('room/getDetails/{id}', 'RoomController@getRoomDetailsId');
Route::get('room/check-availability/{check_in}/{check_out}', 'RoomController@checkAvailable')->name('room.check');
Route::get('datepicker', function(){
    return view('room.check');
});
Route::get('/payment/success', 'ReservationController@paymentSuccess');
Route::get('/payment/refund', 'ReservationController@refundTransaction');
Route::resource('insert', 'InsertController');
Route::post('paypal/notify', 'ReservationController@notify');

//List of Rooms
Route::resource('list','ListOfRoomsController');
Route::get('session/destroyer', 'ReservationController@sessionDestroy');
Route::get('getDates/{id}', 'ReservationController@getDates');
Route::get('/getAvaiableRooms/{checkIn}/{checkOut}', 'RoomController@getAvailableRooms');
Route::get('/updateCheckStatus/{id}/{check}','ReservationController@updateCheckinStatus');

Route::get('contactUs','API\ContactUsController@store');


Route::get('/test', function()
{
    $sample = 'gago si jeric';
    $number = '666';
	$beautymail = app()->make(Muratbsts\MailTemplate\MailTemplate::class);
    $beautymail->send('emails.welcome', ['sample' =>$sample,'number'=>$number], function($message)
    {
        $message
			->from('mangaojeric0505@gmail.com')
			->to('fsiapco@gmail.com', 'Jeric Mangao')
			->subject('Welcome!');
    });

});


Route::get('roomDetails/{id}','ListOfRoomsController@roomDetails');
Route::get('{path}','HomeController@index')->where('path','([A-z\/d\/_.]+)?');
Route::get('/test1', function(){
    return \App\OtherRoomPhoto::all();
});