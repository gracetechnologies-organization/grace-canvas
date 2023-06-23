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
        'image'
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

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function insertCategory(string $Name, string $Description, string $Image)
    {
        return Category::create([
            'name' => ucfirst($Name),
            'description' => ucfirst($Description),
            'image' => $Image
        ]);
    }

    public static function updateCategory(int $ID, string $Name = null, string $Description = null, string $Image = null)
    {
        $Category = Category::findOrFail($ID);
        if (!is_null($Name)) $Category->name = ucfirst($Name);
        if (!is_null($Description)) $Category->description = ucfirst($Description);
        if (!is_null($Image)) $Category->image = $Image;
        return $Category->save();
    }

    public static function deleteCategory(int $ID)
    {
        return Category::where('id', $ID)->delete();
    }

    public static function getCategoryByID(int $ID)
    {
        $Category = Category::findOrFail($ID);
        return [
            "id" => $Category->id,
            "name" => $Category->name,
            "description" => $Category->description,
            "image" => url('/storage/images') . '/' . $Category->image,
            "created_at" => $Category->created_at,
            "updated_at" => $Category->updated_at,
            "deleted_at" => $Category->deleted_at
        ];
    }

    public static function getCategories()
    {
        return Category::all();
    }

    public static function getCategoriesWithWallpapers(int $ID = null)
    {
        $Categories = Category::with('wallpapers')->when($ID, function ($query, $ID) {
            return $query->where('id', $ID);
        })->get();
    
        return $Categories->each(function ($Category) {
            $Category->wallpapers->each(function ($Wallpaper) {
                $Wallpaper->front_image = url('/storage/wallpapers') . '/' . $Wallpaper->front_image;
            });
        });
    }

    public static function getWallpapersOfCategory(int $ID)
    {
        return Category::findOrFail($ID)->wallpapers()->paginate(10);
    }
}
