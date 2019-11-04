<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomImages;
use App\Room;
class RoomImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomImages::all();
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
        $room = Room::find($request->room_id);
        foreach($request->image as  $image) {
            $name = time() . '_' .uniqid() .'.' . explode('/', explode(':', substr( $image, 0, strpos( $image, ';')))[1])[1];
            $request['room_id'] = $request->room_id;
            $request['image'] = $name;

        \Image::make($image)->save(public_path('img/rooms/').$name);
        $room->room_images()->create(['image' => $request->image]);
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
        return RoomImages::where('room_id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$room_id)
    {
        $photo =  RoomImages::find($id);
        $roomPhoto = public_path('img/rooms/').$photo->image;
        if(File_exists($roomPhoto)){
            @unlink($roomPhoto);
        }
   
      $deletephoto =   $photo->delete();

      if($deletephoto){
            return RoomImages::where('room_id',$room_id)->count();
      }
    }
}
