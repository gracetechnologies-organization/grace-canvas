<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cashier\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class Plan extends Model
{
    use HasFactory;
    use Billable;
    // Should be included in the future
    // use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'price',
        'description',
    ];
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    //

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getPlanByID(int $ID)
    {
        return Plan::findOrFail($ID);
    }

    public static function getPlans()
    {
        return Plan::all();
    }
}
