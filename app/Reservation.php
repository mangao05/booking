<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Reservation extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected $guarded = [];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function rooms(){
        return $this->belongsTo('App\Room');
    }

    public function paypal_payments(){
        return $this->hasMany(PaypalPayment::class, 'reservation_id', 'id');
    }
}
