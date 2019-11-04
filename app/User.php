<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
class User extends Authenticatable
{
    
    use Notifiable,HasApiTokens,LogsActivity;
    protected static $logFillable = true;
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
   
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return $eventName;
    }
    public function getLogNameToUse():string 
    {
        $name = \Auth::user()->name;
        return "{$name}";
    }

 

}
