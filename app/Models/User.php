<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Billable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'google_id',
        'facebook_id',
        'linkedin_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function getUserData()
    {
        return auth()->user();
    }

    public static function getUserName()
    {
        return auth()->user()->name;
    }

    public static function getUserID()
    {
        return auth()->user()->id;
    }

    public static function userSubscription()
    {
        $Subscriptions = auth()->user()->subscriptions;
        return $Subscriptions;
    }

    public function subscribPlan()
    {
        return $this->hasMany(SubcribePlan::class, 'user_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class); // Assuming you have a Subscription model
    }
}
