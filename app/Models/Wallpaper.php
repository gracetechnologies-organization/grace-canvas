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

    public static function insertWallpaper(string $FrontImage, int $CatID)
    {
        return Wallpaper::create([
            'front_image' => $FrontImage,
            'cat_id' => $CatID
        ]);
    }

    public static function updateWallpaper(int $ID, string $FrontImage, int $CatID)
    {
        return Wallpaper::where('id', $ID)->update([
            'front_image' => $FrontImage,
            'cat_id' => $CatID
        ]);
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
        // return Wallpaper::paginate(10);
    }
}
