<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
                        'employee' => 'API\EmployeeController',
                        'rooms' => 'API\RoomsController',
                        'amenities' => 'API\AmenitiesController',
                        'roomPhoto' => 'API\OtherRoomPhotoController',
                        'reports' => 'API\ReportController',
                        'contactus'=> 'API\ContactUsController',
                        'roomimages' => 'API\RoomImagesController',
                        'activity' => 'API\ActivityLogController'
                    ]);

//empolyee
Route::get('status/{id}','API\EmployeeController@status');
Route::get('amenitiesStatus/{id}','API\AmenitiesController@status');
Route::get('fetchprofile','API\EmployeeController@fetchProfile');
Route::post('editprofile/{id}','API\EmployeeController@editProfile');

//report
Route::get('reportmonth/{year}/{month}','API\ReportController@filterReport');
Route::get('filterbyname/{name}','API\ReportController@filterByName');

//contact Us
Route::get('editContactStatus/{id}/{status}','API\ContactUsController@update');
Route::get('deleteContact/{id}','API\ContactUsController@destroy');
Route::get('filtercontact/{val}','API\ContactUsController@filterContact');
Route::get('contactCount','API\ContactUsController@contactAllCount');

//moreimage
Route::get('imageroom/{id}','API\RoomImagesController@show');
Route::get('deleteroomImage/{id}/{room_id}','API\RoomImagesController@destroy');

//room
Route::post('amenitiesList','API\RoomsController@amenities');
Route::post('postImage','API\RoomsController@postimage');
Route::get('room/{id}','API\RoomsController@currentRoomPhoto');
Route::get('roomname','API\RoomsController@roomName');
