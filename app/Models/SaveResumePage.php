<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaveResumePage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'resume_id',
        'front_image',
        'form_data',
        'page_code'
    ];
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function savePage(int $UserID, int $ResumeID, string $FrontImage, $FormData, string $PageCode)
    {
        return SaveResumePage::create([
            'user_id' => $UserID,
            'resume_id' => $ResumeID,
            'front_image' => $FrontImage,
            'form_data' => 'Coming Soon',
            'page_code' => $PageCode
        ]);
    }

    public static function updatePage(int $ID, string $PageCode)
    {
        return SaveResumePage::where('id',$ID)->update(['page_code' => $PageCode]);
    }

    public static function deletePage(int $ID)
    {
        return SaveResumePage::find($ID)->forceDelete();
    }

    public static function getSavedPageByID(int $ID)
    {
        return SaveResumePage::findOrFail($ID);
    }

    public static function getSavedPageByUserID(int $UserID)
    {
        return SaveResumePage::with('user')->where('user_id', $UserID)->get();
    }

}
