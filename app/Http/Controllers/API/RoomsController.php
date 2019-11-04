<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Amenities;
use App\Reservation;
class RoomsController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::with('room_amenities')->latest()->paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'price' => 'required',
            'guests' => 'required',
            
        ]);

        if(!isset($request->photo)){
            $name = "gallery.png";
        }
        if($request->photo){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/rooms/').$name);
        }
        $request['photo'] = $name;

        $rooms = Room::create($request->only(['photo','type','price','description','guests']));

        foreach($request->value as $value){
            $request['amenities'] = $value['name'];
            $request['amenities_id'] = $value['code'];
            $rooms->room_amenities()->create($request->only(['amenities','amenities_id']));
            // return $request->amenities;
        }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Room::with('room_amenities')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'price' => 'required',
            'guests' => 'required',
            
        ]);


        $currentPhoto = Room::findOrFail($id)->photo;
        if($request->photo == null){
            $request['photo'] = $currentPhoto;
        }else{
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/rooms/').$name);

            if($currentPhoto != "gallery.png"){
                $roomPhoto = public_path('img/rooms/').$currentPhoto;
                if(File_exists($roomPhoto)){
                    @unlink($roomPhoto);
                }
            }
            $request['photo'] = $name;
        }
            
        $room = Room::with('room_amenities')->whereId($id)->first();
        $room->update($request->only(['photo','type','price','description','guests']));
        
        if(!empty($room->room_amenities)){
            $room->room_amenities()->delete();
        }
        foreach($request->value as $value){
            $request['amenities'] = $value['name'];
            $request['amenities_id'] = $value['code'];
            $room->room_amenities()->updateOrCreate($request->only(['amenities','amenities_id']));
            // return $request->amenities;
        }
    
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // amenities list

    public function amenities(){
        return Amenities::all();
    }

    public function roomName(){
        return Room::with('room_details')->get();
    }
    
}
