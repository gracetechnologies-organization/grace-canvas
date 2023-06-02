<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'front_image',
        'back_image',
        'front_svg',
        'back_svg'
    ];
    /*
    |--------------------------------------------------------------------------
    | Custom Helper Functions
    |--------------------------------------------------------------------------
    */
    public static function getLastInsertedID()
    {
        return BusinessCard::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBusinessCard(string $FrontImage, string $BackImage, string $FrontSvg, string $BackSvg)
    {
        return BusinessCard::create([
            'front_image' => $FrontImage,
            'back_image' => $BackImage,
            'front_svg' => $FrontSvg,
            'back_svg' => $BackSvg
        ]);
    }

    public static function getBusinessCardByID(int $CardID)
    {
        return BusinessCard::find($CardID);
    }

    public static function getBusinessCards()
    {
        return BusinessCard::paginate(10);
    }
}
