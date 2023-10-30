<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fonts extends Model
{
    use
        HasFactory,
        SoftDeletes;

    protected $fillable = [
        'file'
    ];

    /*
    |--------------------------------------------------------------------------
    | ORM Relations
    |--------------------------------------------------------------------------
    */

    // hare ORM

    /*
    |--------------------------------------------------------------------------
    | Custom Helper Functions
    |--------------------------------------------------------------------------
    */

    public static function getFontsByID(int $ID)
    {
        $Font = self::findOrFail($ID);
        return 
            [
                "id" => $Font->id,
                "file" => url('/storage/fonts') . '/' . $Font->file,
            ];
    }

    public static function getFonts()
    {
        return self::all();
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertFont(string $File)
    {
        return self::create([
            'file' => $File,
        ]);
    }

    public static function insertBulkFonts(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateFonts(int $ID, string $File = null)
    {
        $Font = self::findOrFail($ID);
        if (!is_null($File)) $Font->File = $File;
        return $Font->save();
    }

    public static function deleteFontsByID(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllFonts()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreFontsByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllFonts()
    {
        return self::query()->restore();
    }

}
