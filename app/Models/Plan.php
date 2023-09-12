<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cashier\User;
class Plan extends Model
{
    use HasFactory;

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


    /**
     * Write code on Method
     *
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
