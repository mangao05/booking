<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;
class Amenities extends Model
{
    use LogsActivity;
protected static $logFillable = true;
protected static $logAttributes = ['*'];
protected static $logOnlyDirty = true;

    protected $guarded = [];

    public function room_amenities_list(){
        return $this->hasMany('App\RoomAmenities', 'id', 'amenities_id');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
      
        return $eventName;
    }
    public function getLogNameToUse():string 
    {
        $name = Auth::user()->name;
        return $name;
    }
}


