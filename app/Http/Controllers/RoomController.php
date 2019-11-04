<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;
use App\Reservation;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::pluck('type', 'id');
        return view('room.index', compact('rooms'));
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
        $reserve = explode(' - ', $request->get('dates'));
        $check_in = $reserve[0];
        $check_out = $reserve[1];
        $reservation = Reservation::create([
            'room_id' => 2,
            'customer_id' => 1,
            'check_in' => $check_in,
            'check_out' => $check_out
        ])->save();
        return "success";
    }

    /**
     * Display the specified resource. 
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }

    public function checkAvailable($check_in, $check_out){
        
        $checkIn = \Carbon\Carbon::parse($check_in)->format('Y-m-d');
        $checkOut = \Carbon\Carbon::parse($check_out)->format('Y-m-d');
        
        $rooms = Room::with(['room_amenities',
           'room_details' => function($child) use ($checkIn, $checkOut){
               return $child->with('reservations')->whereNotIn('room_no', function($query) use ($checkIn, $checkOut){
                    return $query->select('room_no')
                        ->from('reservations')
                        ->where([
                            ['reservations.check_out', '>=', $checkIn],
                            ['reservations.check_in', '<=', $checkOut],
                            
                        ])->orWhere([
                            ['reservations.check_out', '<=', $checkIn],
                            ['reservations.check_in', '>=', $checkOut], 
                        ]);
               });
           }
              
        ])->get();
    
        return view('room.available', compact('rooms', 'checkIn', 'checkOut'));
        
    }     
    
    public function getAvailableRooms($checkIn, $checkOut){
        $rooms = Room::with(['room_amenities',
           'room_details' => function($child) use ($checkIn, $checkOut){
               return $child->with('reservations')->whereNotIn('room_no', function($query) use ($checkIn, $checkOut){
                    return $query->select('room_no')
                        ->from('reservations')
                        ->where([
                            ['reservations.check_out', '>=', $checkIn],
                            ['reservations.check_in', '<=', $checkOut]
                        ])->orWhere([
                            ['reservations.check_out', '<=', $checkIn],
                            ['reservations.check_in', '>=', $checkOut],
                        ]);
               });
           }
              
        ])->get();

        return response()->json($rooms, 200);
    }


    public function getRoomDetails(Request $request){
        $room = Room::with('room_details')->find($request->get('rooms'));
        return view('room.booking', compact('room'));

    }

    public function getRoomDetailsId($id){
          $rooms = Room::with(['reservations' => function($query){
            return $query->whereNull('status')->orWhere('status', '=', 'arrived');
        }])
        ->find($id);

       
        foreach($rooms->reservations as $key => $reservation){
            $dates[] = $this->getDatesFromRange($reservation->check_in, $reservation->check_out);       
        }
        return response()->json($dates);
    }


    public function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;
    }

   
}
