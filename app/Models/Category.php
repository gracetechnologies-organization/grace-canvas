<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
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
    public static function insertCategory(string $Name)
    {
        return Category::create([
            'name' => ucfirst($Name)
        ]);
    }

    public static function updateCategory(int $ID, string $Name)
    {
        return Category::where('id', $ID)->update([
            'name' => ucfirst($Name)
        ]);
    }

    public static function deleteCategory(int $ID)
    {
        return Category::where('id', $ID)->delete();
    }

    public static function getCategoryByID(int $ID)
    {
        return Category::findOrFail($ID);
    }

    public static function getCategories()
    {
        return Category::all();
    }

    public static function getWallpapersOfCategory(int $ID)
    {
        return Category::findOrFail($ID)->wallpapers()->paginate(10);
    }
}
