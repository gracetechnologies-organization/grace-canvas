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
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertLetterHead(string $FrontImage, string $FrontSvg)
    {
        return self::create([
            'front_image' => $FrontImage,
            'front_svg' => $FrontSvg
        ]);
    }

    public static function updateLetterHead(int $ID, string $FrontImage)
    {
        return self::where('id', $ID)->update([
            'front_image' => $FrontImage
        ]);
    }

    public static function deleteLetterHead(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function getLetterHeadByID(int $ID)
    {
        return self::findOrFail($ID);
    }

    public static function getLetterHeads()
    {
        return self::paginate(10);
    }
}
