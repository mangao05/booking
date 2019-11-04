<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class ContactUs extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected $guarded = [];
}
