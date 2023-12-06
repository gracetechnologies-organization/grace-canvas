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
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getStickerByID(int $ID)
    {
        $Sticker = self::findOrFail($ID);
        return [
            "id" => $Sticker->id,
            "image" => url('/storage/stickers') . '/' . $Sticker->image,
            "thumbnail" => url('/storage/stickers/thumbnails') . '/' . $Sticker->thumbnail
        ];
    }

    public static function getStickers()
    {
        return self::paginate(12);
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertSticker(string $Image, string $Thumbnail)
    {
        return self::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail
        ]);
    }

    public static function insertBulkStickers(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateSticker(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $Sticker = self::findOrFail($ID);
        if (!is_null($Image)) $Sticker->image = $Image;
        if (!is_null($Thumbnail)) $Sticker->thumbnail = $Thumbnail;
        return $Sticker->save();
    }

    public static function deleteStickerByID(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllStickers()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreStickerByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllStickers()
    {
        return self::query()->restore();
    }
}
