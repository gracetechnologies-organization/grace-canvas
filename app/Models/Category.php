<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_cat_id'
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
    public function wallpapers()
    {
        return $this->hasMany(Wallpaper::class, 'cat_id');
    }

    public function clockWallpapers()
    {
        return $this->hasMany(ClockWallpaper::class, 'cat_id');
    }
    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function insertCategory(string $Name, string $Description, string $Image, int $ParentCatID)
    {
        return self::create([
            'name' => ucfirst($Name),
            'description' => ucfirst($Description),
            'image' => $Image,
            'parent_cat_id' => $ParentCatID
        ]);
    }

    public static function updateCategory(int $ID, string $Name = null, string $Description = null, string $Image = null, int $ParentCatID = null)
    {
        $Category = self::findOrFail($ID);
        if (!is_null($Name)) $Category->name = ucfirst($Name);
        if (!is_null($Description)) $Category->description = ucfirst($Description);
        if (!is_null($Image)) $Category->image = $Image;
        if (!is_null($ParentCatID)) $Category->parent_cat_id = $ParentCatID;
        return $Category->save();
    }

    public static function deleteCategory(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function getCategoryByID(int $ID)
    {
        $Category = self::findOrFail($ID);
        return [
            "id" => $Category->id,
            "name" => $Category->name,
            "description" => $Category->description,
            "image" => url('/storage/images') . '/' . $Category->image
        ];
    }

    public static function getCategoriesByParentCatID(int $ParentCatID)
    {
        return self::where('parent_cat_id', $ParentCatID)->get();
    }

    public static function getCategories()
    {
        return self::all();
    }

    public static function getCategoriesWithWallpapers(int $ID = null)
    {
        $Categories = self::with('wallpapers')
        ->when($ID, function ($Query, $ID) {
            return $Query->where('id', $ID);
        })->get();

        return $Categories->each(function ($Category) {
            $Category->wallpapers->each(function ($Wallpaper) {
                $Wallpaper->front_image = url('/storage/wallpapers') . '/' . $Wallpaper->front_image;
                $Wallpaper->thumbnail = url('/storage/wallpapers/thumbnails') . '/' . $Wallpaper->thumbnail;
            });
        });
    }

    public static function getClockWallpapersOfCategory(int $ID)
    {
        return self::findOrFail($ID)->clockWallpapers()->paginate(10);
    }

    public static function getWallpapersOfCategory(int $ID)
    {
        // return self::findOrFail($ID)->wallpapers()->paginate(10);
        return self::findOrFail($ID)->wallpapers()->get();
    }
}
