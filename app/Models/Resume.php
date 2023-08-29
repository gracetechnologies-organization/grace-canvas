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
        'version',
        'cat_id'
    ];
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function category()
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
        return Resume::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertResume(string $FrontImage, int $Version, int $CatID)
    {
        return Resume::create([
            'front_image' => $FrontImage,
            'version' => $Version,
            'cat_id' => $CatID,
        ]);
    }

    public static function updateResume(int $ID, string $FrontImage = null, int $Version = null, int $CatID = null)
    {
        $Resume = Resume::findOrFail($ID);
        if (!is_null($FrontImage)) $Resume->front_image = $FrontImage;
        if (!is_null($Version)) $Resume->version = $Version;
        if (!is_null($CatID)) $Resume->cat_id = $CatID;
        return $Resume->save();
    }
    // If no params are provided this function will delete all records
    public static function deleteResumesByGivenParams(int $ID = null,  int $CatID = null, int $Version = null)
    {
        return Resume::when($ID, function ($Query, $ID) {
            return $Query->where('id', $ID);
        })->when($CatID, function ($Query, $CatID) {
            return $Query->where('cat_id', $CatID);
        })->when($Version, function ($Query, $Version) {
            return $Query->where('version', $Version);
        })->delete();
    }

    public static function deleteAllResumes(int $ID)
    {
        return Resume::query()->update(['deleted_at' => now()]);
    }

    public static function restoreResume(int $ID)
    {
        return Resume::where('id', $ID)->restore();
    }

    public static function restoreAllResumes()
    {
        return Resume::query()->restore();
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
