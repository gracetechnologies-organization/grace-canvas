<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoCollage extends Model
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

    public static function insertInfo(string $Image, string $Thumbnail)
    {
        return self::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail
        ]);
    }

    public static function insertBulkInfo(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateInfo(int $ID, string $Image = null, string $Thumbnail = null, string $Dimensions)
    {
        $PhotoCollage = self::findOrFail($ID);
        if (!is_null($Image)) $PhotoCollage->image = $Image;
        if (!is_null($Thumbnail)) $PhotoCollage->thumbnail = $Thumbnail;
        if (!is_null($Dimensions)) $PhotoCollage->dimensions = $Dimensions;
        return $PhotoCollage->save();
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function deleteInfoByCatID(int $CatID)
    {
        return self::where('cat_id', $CatID)->delete();
    }

    public static function deleteInfo(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllInfo()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreInfoByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllInfo()
    {
        return self::query()->restore();
    }

    public static function getInfoByID(int $ID)
    {
        $PhotoCollage = self::findOrFail($ID);
        return [
            "id" => $PhotoCollage->id,
            "image" => url('/storage/PhotoCollages') . '/' . $PhotoCollage->image,
            "thumbnail" => url('/storage/PhotoCollages/thumbnails') . '/' . $PhotoCollage->thumbnail,
            "dimensions" => json_decode($PhotoCollage->dimensions)
        ];
    }

    public static function getAllInfo()
    {
        return self::paginate(12);
    }
}
