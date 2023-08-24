<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'front_image',
        'front_svg',
        'version'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class ,'cat_id');
    }
    public static function getLastInsertedID()
    {
        return Resume::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertResume(string $FrontImage, string $FrontSvg, int $Version)
    {
        return Resume::create([
            'front_image' => $FrontImage,
            'front_svg' => $FrontSvg,
            'version' => $Version
        ]);
    }

    public static function updateResume(int $ID, string $FrontImage = null, int $Version = null)
    {
        $Resume = Resume::findOrFail($ID);
        if (!is_null($FrontImage)) $Resume->front_image = $FrontImage;
        if (!is_null($Version)) $Resume->version = $Version;
        return $Resume->save();
    }

    public static function deleteResume(int $ID)
    {
        return Resume::where('id', $ID)->delete();
    }

    public static function getResumeByID(int $ID)
    {
        return Resume::findOrFail($ID);
    }

    public static function getResumes()
    {
        return Resume::with('category');
    }
}
