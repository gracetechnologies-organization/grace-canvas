<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | This model is out of use yet
    |--------------------------------------------------------------------------
    */

class Audio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'file',
        'time'
    ];
    /*
    |--------------------------------------------------------------------------
    | ORM Relations
    |--------------------------------------------------------------------------
    */
    // 

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function getAudioByID(int $ID)
    {
        $Audio = self::findOrFail($ID);
        return [
            "id" => $Audio->id,
            "file" => url('/storage/audios') . '/' . $Audio->file,
            "time" => $Audio->time
        ];
    }

    public static function getAudios()
    {
        return self::paginate(4);
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertAudio(string $File, string $Time)
    {
        return self::create([
            'file' => $File,
            'Time' => $Time
        ]);
    }

    public static function insertBulkAudios(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateAudio(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $Audio = self::findOrFail($ID);
        if (!is_null($Image)) $Audio->image = $Image;
        if (!is_null($Thumbnail)) $Audio->thumbnail = $Thumbnail;
        return $Audio->save();
    }

    public static function deleteAudioByID(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllAudios()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreAudioByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllAudios()
    {
        return self::query()->restore();
    }
}
