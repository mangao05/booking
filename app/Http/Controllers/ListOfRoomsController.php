<?php

namespace App\Http\Controllers;

use App\ListOfRooms;
use App\Room;
use App\Amenities;
use Illuminate\Http\Request;

class ListOfRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with(['room_details.reservations', 'room_amenities.list_amenities'])->paginate(5);
        
        return view('room.list_of_rooms', compact('rooms'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListOfRooms  $listOfRooms
     * @return \Illuminate\Http\Response
     */
    public function show(ListOfRooms $listOfRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListOfRooms  $listOfRooms
     * @return \Illuminate\Http\Response
     */
    public function edit(ListOfRooms $listOfRooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListOfRooms  $listOfRooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListOfRooms $listOfRooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListOfRooms  $listOfRooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListOfRooms $listOfRooms)
    {
        //
    }

    public function footerSampleRoom(){
        $sampleRoom = Room::all();
        return view('home.index',compact('sampleRoom'));
    }

    public function roomDetails($id){
        $roomDetails = Room::with('room_amenities.list_amenities')->findOrFail($id);

        return $roomDetails;
    }
}
