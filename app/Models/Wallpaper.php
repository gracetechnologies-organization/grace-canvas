<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallpaper extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'front_image',
        'type',
        'cat_id'
    ];
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getLastInsertedID()
    {
        return Wallpaper::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertWallpaper(string $FrontImage, int $Type, int $CatID)
    {
        return Wallpaper::create([
            'front_image' => $FrontImage,
            'type' => $Type,
            'cat_id' => $CatID
        ]);
    }

    public static function updateWallpaper(int $ID, string $FrontImage = null, int $Type = null, int $CatID = null)
    {
        $Wallpaper = Wallpaper::findOrFail($ID);
        if (!is_null($FrontImage)) $Wallpaper->front_image = $FrontImage;
        if (!is_null($Type)) $Wallpaper->type = $Type;
        if (!is_null($CatID)) $Wallpaper->cat_id = $CatID;
        return $Wallpaper->save();
    }

    public static function deleteWallpaper(int $ID)
    {
        return Wallpaper::where('id', $ID)->delete();
    }

    public static function getWallpaperByID(int $ID)
    {
        return Wallpaper::findOrFail($ID);
    }

    public static function getWallpapers()
    {
        return Wallpaper::with(['categories'])->paginate(10);
    }
}
