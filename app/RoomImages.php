<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class RoomImages extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected $guarded = [];

    public function rooms(){
        return $this->belongsTo('App\Room');
    }

}
