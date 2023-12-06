<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthdayCake extends Model
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
    public static function getBirthdayCakeByID(int $ID)
    {
        $BirthdayCake = self::findOrFail($ID);
        return [
            "id" => $BirthdayCake->id,
            "image" => url('/storage/birthday_cakes') . '/' . $BirthdayCake->image,
            "thumbnail" => url('/storage/birthday_cakes/thumbnails') . '/' . $BirthdayCake->thumbnail
        ];
    }

    public static function getBirthdayCakes()
    {
        return self::paginate(9);
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayCake(string $Image, string $Thumbnail)
    {
        return self::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail
        ]);
    }

    public static function insertBulkBirthdayCakes(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateBirthdayCake(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $BirthdayCake = self::findOrFail($ID);
        if (!is_null($Image)) $BirthdayCake->image = $Image;
        if (!is_null($Thumbnail)) $BirthdayCake->thumbnail = $Thumbnail;
        return $BirthdayCake->save();
    }

    public static function deleteBirthdayCakeByID(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllBirthdayCakes()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreBirthdayCakeByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllBirthdayCakes()
    {
        return self::query()->restore();
    }
}
