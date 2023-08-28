<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthdayTempletes extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'front_image',
        'svg',
        'version',
        'default',
    ];


    public static function getBirthdayTempletesByID(int $ID)
    {
        $birthdayTempletes = BirthdayTempletes::findOrFail($ID);
        return [
            "id" => $birthdayTempletes->id,
            "front_image" => $birthdayTempletes->front_image,
            "svg" => $birthdayTempletes->svg,
            'version' => $birthdayTempletes->version,
            'default' => $birthdayTempletes->default,
            "created_at" => $birthdayTempletes->created_at,
            "updated_at" => $birthdayTempletes->updated_at,
            "deleted_at" => $birthdayTempletes->deleted_at
        ];
    }

    public static function getbirthdayTempletes()
    {
        return BirthdayTempletes::all();
    }

    public static function getLastInsertedID()
    {
        return BirthdayTempletes::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayTempletes(string $FrontImage, string $FrontSvg , int $version = 0 , int $default = 0 )
    {
        return BirthdayTempletes::create([
            'front_image' => $FrontImage,
            'svg' => $FrontSvg,
            'version' => $version,
            'default' => $default,
        ]);
    }

    public static function updateBirthdayTempletes(int $ID , string $FrontImage = null , string $FrontSvg = null ,int $version = null ,int $default = null)
    {
        // return BirthdayTempletes::where('id', $ID)->update([
        //     'front_image' => $FrontImage ,
        //     'svg' => $FrontSvg ,
        //     'version' => $version ,
        //     'default' => $default ,
        // ]);
        $BirthdayTemplete = BirthdayTempletes::findOrFail($ID);
        if (!is_null($FrontImage)) $BirthdayTemplete->front_image = $FrontImage;
        if (!is_null($FrontSvg)) $BirthdayTemplete->svg =  $FrontSvg ;
        if (!is_null($version)) $BirthdayTemplete->version = $version;
        if (!is_null($default)) $BirthdayTemplete->default = $default;
        return $BirthdayTemplete->save();

    }
}
