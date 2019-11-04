<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Customer extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected $guarded = [];
    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

  


}
