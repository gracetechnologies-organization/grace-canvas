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

    public static function getBirthdayCakeByID(int $ID)
    {
        $BirthdayCake = BirthdayCake::findOrFail($ID);
        return [
            "id" => $BirthdayCake->id,
            "image" => url('/storage/images/birthday_cakes') . '/' . $BirthdayCake->image,
            "thumbnail" => url('/storage/images/birthday_cakes/thumbnails') . '/' . $BirthdayCake->thumbnail
        ];
    }

    public static function getBirthdayCakes()
    {
        return BirthdayCake::paginate(4);
    }

    public static function getLastInsertedID()
    {
        return BirthdayCake::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayCake(string $Image, string $Thumbnail)
    {
        return BirthdayCake::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail
        ]);
    }

    public static function updateBirthdayCake(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $BirthdayCake = BirthdayCake::findOrFail($ID);
        if (!is_null($Image)) $BirthdayCake->image = $Image;
        if (!is_null($Thumbnail)) $BirthdayCake->thumbnail = $Thumbnail;
        return $BirthdayCake->save();
    }

    public static function deleteBirthdayCakeByID(int $ID)
    {
        return BirthdayCake::where('id', $ID)->delete();
    }

    public static function deleteAllBirthdayCakes()
    {
        return BirthdayCake::query()->update(['deleted_at' => now()]);
    }

    public static function restoreBirthdayCakeByID(int $ID)
    {
        return BirthdayCake::where('id', $ID)->restore();
    }

    public static function restoreAllBirthdayCakes()
    {
        return BirthdayCake::query()->restore();
    }
}
