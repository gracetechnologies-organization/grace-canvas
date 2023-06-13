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

    public static function insertLetterHead(string $FrontImage, string $FrontSvg)
    {
        return LetterHead::create([
            'front_image' => $FrontImage,
            'front_svg' => $FrontSvg
        ]);
    }

    public static function updateLetterHead(int $CardID, string $FrontImage)
    {
        return LetterHead::where('id', $CardID)->update([
            'front_image' => $FrontImage
        ]);
    }

    public static function deleteLetterHead(int $CardId)
    {
        return LetterHead::where('id', $CardId)->delete();
    }

    public static function getLetterHeadByID(int $CardID)
    {
        return LetterHead::findOrFail($CardID);
    }

    public static function getLetterHeads()
    {
        return LetterHead::paginate(10);
    }
}
