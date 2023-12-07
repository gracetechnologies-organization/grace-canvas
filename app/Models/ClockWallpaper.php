<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClockWallpaper extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'thumbnail',
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
    public static function insertBulkInfo(array $Data)
    {
        return self::insert($Data);
    }

    public static function insertInfo(string $ImageName = null, string $Thumbnail = null, int $CatID = null)
    {
        return self::create([
            'image' => $ImageName,
            'thumbnail' => $Thumbnail,
            'cat_id' => $CatID
        ]);
    }

    public static function updateInfo(int $ID, string $ImageName = null, string $Thumbnail = null, int $CatID = null)
    {
        $Info = self::findOrFail($ID);
        if (!is_null($ImageName)) $Info->image = $ImageName;
        if (!is_null($Thumbnail)) $Info->thumbnail = $Thumbnail;
        if (!is_null($CatID)) $Info->cat_id = $CatID;
        return $Info->save();
    }

    public static function deleteInfoByCatID(int $CatID)
    {
        return self::where('cat_id', $CatID)->delete();
    }

    public static function deleteInfo(int $ID)
    {
        return self::where('id', $ID)->delete();
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
        $Info = self::findOrFail($ID);
        return [
            "id" => $Info->id,
            "image" => $Info->image,
            "thumbnail" => $Info->thumbnail,
            "cat_id" => $Info->cat_id
        ];
    }

    public static function getAll()
    {
        return self::with(['categories'])->get();
    }
}
