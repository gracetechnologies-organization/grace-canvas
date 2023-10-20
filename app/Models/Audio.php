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
    | Custom Helper Functions
    |--------------------------------------------------------------------------
    */
    public static function getAudioByID(int $ID)
    {
        $Audio = Audio::findOrFail($ID);
        return [
            "id" => $Audio->id,
            "file" => url('/storage/audios') . '/' . $Audio->file,
            "time" => $Audio->time
        ];
    }

    public static function getAudios()
    {
        return Audio::paginate(4);
    }

    public static function getLastInsertedID()
    {
        return Audio::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertAudio(string $File, string $Time)
    {
        return Audio::create([
            'file' => $File,
            'Time' => $Time
        ]);
    }

    public static function insertBulkAudios(array $Data)
    {
        return Audio::insert($Data);
    }

    public static function updateAudio(int $ID, string $Image = null, string $Thumbnail = null)
    {
        $Audio = Audio::findOrFail($ID);
        if (!is_null($Image)) $Audio->image = $Image;
        if (!is_null($Thumbnail)) $Audio->thumbnail = $Thumbnail;
        return $Audio->save();
    }

    public static function deleteAudioByID(int $ID)
    {
        return Audio::where('id', $ID)->delete();
    }

    public static function deleteAllAudios()
    {
        return Audio::query()->update(['deleted_at' => now()]);
    }

    public static function restoreAudioByID(int $ID)
    {
        return Audio::where('id', $ID)->restore();
    }

    public static function restoreAllAudios()
    {
        return Audio::query()->restore();
    }
}
