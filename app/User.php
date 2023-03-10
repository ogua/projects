<?php

namespace App;

use APP\Lecturer;
use App\Notifications\CustomPasswordReset;
use App\Regacademicyear;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable,Wallet
{
    use Notifiable,HasRoles,LogsActivity,HasWallet, CanConfirm, CanPay;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','indexnumber',
        'force_logout','is_active','pro_pic',
    ];




     /** 
    *
    * Spartie Customizing the log name
    *
    */

     protected static $logName = 'User';

    /** 
    *
    * Spartie Log Attribues
    *
    */

     protected static $logAttributes = ['email', 'name'];

     /** 
    *
    * Spartie Record Events For
    *
    */

    protected static $recordEvents = ['deleted','created','updated'];

     /** 
    *
    * Spartie Customizing the description
    *
    */

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This user Information has been {$eventName}";
    }


     /** 
    *
    * Spartie Logging only the changed attributes
    *
    */

   protected static $logOnlyDirty = true;

/** 
    *
    * Spartie Prevent save logs items that have no changed attribute
    *
    */


   protected static $submitEmptyLogs = false;



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



    public function studentinfos(){
        return $this->hasMany('App\Studentinfo');
    }



    //this method is for the custom mail send notification.the method bmust be the same has laravel default method
    public function sendPasswordResetNotification($token){
        $this->notify(new CustomPasswordReset($token));
    }



    public function lectures(){
        return $this->hasMany('App\Lecturer');
    }

    public function getappLectures($id){
        return Lecturer::where('user_id',$id)->get();
    }
    
    public function regsemesters(){
        return Regacademicyear::where('user_id',auth()->user()->id)->get();
    }

    public function getimage($id){
        
    }


    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'password', 'remember_token',
    ];

}
