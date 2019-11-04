<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class PaypalPayment extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected $guarded = [];
    protected $table = 'paypal_payment';

    public function reservations(){
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }

   
}
