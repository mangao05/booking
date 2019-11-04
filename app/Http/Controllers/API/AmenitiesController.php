<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Amenities;

class AmenitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Amenities::latest()->paginate(10);
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
            'amenities' => 'required|string|max:255'
        ]);
        $request['status'] = "Deactivated";
        Amenities::create($request->only(['amenities','icon','status']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Amenities::findOrFail($id);
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
            'amenities' => 'required|string|max:255'
        ]);

        $amenities = Amenities::findOrFail($id);
        $amenities->amenities = $request->amenities;
        $amenities->icon = $request->icon;
        $amenities->save();
    }

    public function status($id){
        $status = Amenities::findOrFail($id);
        ($status->status == "Deactivated")?$status->status = "Activated" : $status->status = "Deactivated";
        $status->save();

      
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
}
