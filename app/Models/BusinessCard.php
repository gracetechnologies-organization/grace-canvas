<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'front_image',
        'back_image',
        'front_svg',
        'back_svg'
    ];
    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBusinessCard(string $FrontImage, string $BackImage, string $FrontSvg, string $BackSvg)
    {
        return self::create([
            'front_image' => $FrontImage,
            'back_image' => $BackImage,
            'front_svg' => $FrontSvg,
            'back_svg' => $BackSvg
        ]);
    }

    public static function updateBusinessCard(int $ID, string $FrontImage, string $BackImage)
    {
        return self::where('id', $ID)->update([
            'front_image' => $FrontImage,
            'back_image' => $BackImage
        ]);
    }

    public static function deleteBusinessCard(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function getBusinessCardByID(int $ID)
    {
        return self::findOrFail($ID);
    }

    public static function getBusinessCards()
    {
        return self::paginate(10);
    }
}
