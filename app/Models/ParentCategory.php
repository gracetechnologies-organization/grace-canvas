<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
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
    //

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public static function insertInfo(string $Name)
    {
        return self::create([
            'name' => ucfirst($Name)
        ]);
    }

    public static function updateInfo(int $ID, string $Name = null)
    {
        $Info = self::findOrFail($ID);
        if (!is_null($Name)) $Info->name = ucfirst($Name);
        return $Info->save();
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
            "name" => $Info->name
        ];
    }

    public static function getAll()
    {
        return self::all();
    }
}
