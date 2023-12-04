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
        'thumbnail',
        'type',
        'cat_id'
    ];
    /**
     * The attributes that should be hidden for arrays/JSON
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
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
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertWallpaper(string $FrontImage, string $Thumbnail, int $Type, int $CatID)
    {
        return self::create([
            'front_image' => $FrontImage,
            'thumbnail' => $Thumbnail,
            'type' => $Type,
            'cat_id' => $CatID
        ]);
    }

    public static function insertBulkWallpapers(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateWallpaper(int $ID, string $FrontImage = null, int $Type = null, int $CatID = null)
    {
        $Wallpaper = self::findOrFail($ID);
        if (!is_null($FrontImage)) $Wallpaper->front_image = $FrontImage;
        if (!is_null($Type)) $Wallpaper->type = $Type;
        if (!is_null($CatID)) $Wallpaper->cat_id = $CatID;
        return $Wallpaper->save();
    }

    public static function deleteWallpaper(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteWallpapersByCatID(int $CatID, int $Type)
    {
        return self::where('cat_id', $CatID)->where('type', $Type)->delete();
    }

    public static function restoreWallpaperByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreWallpapersByCatID(int $CatID, int $Type)
    {
        return self::where('cat_id', $CatID)->where('type', $Type)->restore();
    }

    public static function getWallpaperByID(int $ID)
    {
        return self::findOrFail($ID);
    }

    public static function getWallpapers()
    {
        // return self::with(['categories'])->paginate(10);
        return self::with(['categories'])->get();
    }
}
