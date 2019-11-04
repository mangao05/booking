<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Room extends Model
{
    use LogsActivity;
    
    protected $guarded = [];
    protected static $logFillable = true;
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    public function room_details(){
        return $this->hasMany('App\RoomDetails');
    }

    public function room_amenities(){
        return $this->hasMany('App\RoomAmenities');
    }

    public function room_images(){
        return $this->hasMany('App\RoomImages');
    }
    public function reservations(){
        return $this->belongsTo(Room::class, 'room_details_id', 'id');
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return $eventName;
    }
    public function getLogNameToUse():string 
    {
        return "User" ;
    }
   



}
