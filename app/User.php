<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','image'
    ];

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

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail());
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::updating(function (User $user) {
    //         if (in_array('email', $user->getChanges())) {
    //             $user->email_verified_at = null;
    //             $user->sendEmailVerificationNotification();
    //         }
    //     });
    // }
    public function shop(){
        return $this->hasOne(shop::class,'user_id','id');
    }
    public function cartItems(){
            return $this->hasMany(Cart::class,'user_id','id');
    }
}
