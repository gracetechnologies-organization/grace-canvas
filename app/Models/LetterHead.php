<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LetterHead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'front_image',
        'front_svg'
    ];
    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getLastInsertedID()
    {
        return LetterHead::orderByDesc('id')->first()->id ?? 0;
    }

    // Modify the following helpers
    public static function insertBusinessCard(string $FrontImage, string $BackImage, string $FrontSvg, string $BackSvg)
    {
        return BusinessCard::create([
            'front_image' => $FrontImage,
            'back_image' => $BackImage,
            'front_svg' => $FrontSvg,
            'back_svg' => $BackSvg
        ]);
    }

    public static function updateBusinessCard(int $CardID, string $FrontImage, string $BackImage)
    {
        return BusinessCard::where('id', $CardID)->update([
            'front_image' => $FrontImage,
            'back_image' => $BackImage
        ]);
    }

    public static function deleteBusinessCard(int $CardId)
    {
        return BusinessCard::where('id', $CardId)->delete();
    }

    public static function getBusinessCardByID(int $CardID)
    {
        return BusinessCard::findOrFail($CardID);
    }

    public static function getBusinessCards()
    {
        return BusinessCard::paginate(10);
    }
}
