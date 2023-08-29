<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthdayTemplates extends Model
{
    use HasFactory , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'front_image',
        'svg',
        'version',
        'default',
    ];


    public static function getBirthdayTempletesByID(int $ID)
    {
        $birthdayTempletes = BirthdayTemplates::findOrFail($ID);
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
        return BirthdayTemplates::inRandomOrder()->paginate(4);
    }

    public static function getLastInsertedID()
    {
        return BirthdayTemplates::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayTempletes(string $FrontImage, string $FrontSvg , int $version = 0 , int $default = 0 )
    {
        return BirthdayTemplates::create([
            'front_image' => $FrontImage,
            'svg' => $FrontSvg,
            'version' => $version,
            'default' => $default,
        ]);
    }

    public static function updateBirthdayTempletes(int $ID , string $FrontImage = null , string $FrontSvg = null ,int $version = null ,int $default = null)
    {
        $BirthdayTemplete = BirthdayTemplates::findOrFail($ID);
        if (!is_null($FrontImage)) $BirthdayTemplete->front_image = $FrontImage;
        if (!is_null($FrontSvg)) $BirthdayTemplete->svg =  $FrontSvg ;
        if (!is_null($version)) $BirthdayTemplete->version = $version;
        if (!is_null($default)) $BirthdayTemplete->default = $default;
        return $BirthdayTemplete->save();

    }

    public static function deleteBirthdayTemplete(int $ID)
    {
        return BirthdayTemplates::where('id',$ID)->delete();
    }

    public static function deleteAllBirthdayTempletes()
    {
        return BirthdayTemplates::query()->update(['deleted_at' => now()]);


    }
    public static function restoreBirthdayTemplete(int $ID)
    {
        return BirthdayTemplates::where('id',$ID)->restore();
    }

    public static function restoreAllBirthdayTempletes()
    {
         return BirthdayTemplates::query()->restore();


    }
}
