<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sticker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'thumbnail'
    ];
    /*
    |--------------------------------------------------------------------------
    | ORM Relations
    |--------------------------------------------------------------------------
    */
    // 

    /*
    |--------------------------------------------------------------------------
    | Custom Helper Functions
    |--------------------------------------------------------------------------
    */
    public static function getStickerByID(int $ID)
    {
        $Sticker = Sticker::findOrFail($ID);
        return [
            "id" => $Sticker->id,
            "image" => url('/storage/stickers') . '/' . $Sticker->image,
            "thumbnail" => url('/storage/stickers/thumbnails') . '/' . $Sticker->thumbnail
        ];
    }

    public static function getStickers()
    {
        return Sticker::paginate(12);
    }

    public static function getLastInsertedID()
    {
        return Sticker::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertSticker(string $Image, string $Thumbnail)
    {
        return Sticker::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail
        ]);
    }

    public static function insertBulkStickers(array $Data)
    {
        return Sticker::insert($Data);
    }

    public static function updateSticker(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $Sticker = Sticker::findOrFail($ID);
        if (!is_null($Image)) $Sticker->image = $Image;
        if (!is_null($Thumbnail)) $Sticker->thumbnail = $Thumbnail;
        return $Sticker->save();
    }

    public static function deleteStickerByID(int $ID)
    {
        return Sticker::where('id', $ID)->delete();
    }

    public static function deleteAllStickers()
    {
        return Sticker::query()->update(['deleted_at' => now()]);
    }

    public static function restoreStickerByID(int $ID)
    {
        return Sticker::where('id', $ID)->restore();
    }

    public static function restoreAllStickers()
    {
        return Sticker::query()->restore();
    }
}
