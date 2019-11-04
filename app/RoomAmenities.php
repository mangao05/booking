<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAmenities extends Model
{
    
    protected $guarded = [];

    public function rooms(){
        return $this->belongsTo('App\Room');
    }

    public function list_amenities(){
        return $this->belongsTo('App\Amenities', 'amenities_id', 'id');
    }


    
}
