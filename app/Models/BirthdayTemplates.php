<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthdayTemplates extends Model
{
    use HasFactory, SoftDeletes;

    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'thumbnail',
        'type',
        'version'
    ];

    public function getTypeAttribute($Value)
    {
        // Define a mapping for enum values to human-readable values
        $TypeMapping = [
            1 => 'landscape',
            2 => 'portrait',
            3 => 'square',
        ];
        // Check if the value exists in the mapping; if not, return the value as is
        return $TypeMapping[$Value] ?? null;
    }

    public static function getBirthdayTemplateByID(int $ID)
    {
        $BirthdayTemplate = self::findOrFail($ID);
        return [
            "id" => $BirthdayTemplate->id,
            "image" => url('/storage/birthday_templates') . '/' . $BirthdayTemplate->image,
            "thumbnail" => url('/storage/birthday_templates/thumbnails') . '/' . $BirthdayTemplate->thumbnail,
            "type" => $BirthdayTemplate->type,
            "version" => $BirthdayTemplate->version
        ];
    }

    // public static function getDefaultBirthdayTemplate()
    // {
    //     $birthdayTemplates = self::where('default', 1)->first();
    //     return [
    //         "id" => $birthdayTemplates->id,
    //         "front_image" => url('/storage/images/birthday_templates') . '/' . $birthdayTemplates->front_image,
    //         "svg" => $birthdayTemplates->svg,
    //         'version' => $birthdayTemplates->version,
    //         'default' => $birthdayTemplates->default,
    //         "created_at" => $birthdayTemplates->created_at,
    //         "updated_at" => $birthdayTemplates->updated_at,
    //         "deleted_at" => $birthdayTemplates->deleted_at
    //     ];
    // }

    public static function getBirthdayTemplates(int $Type = null)
    {
        return self::when($Type, function ($Query) use ($Type) {
            return $Query->where('type', $Type);
        })->paginate(8);
    }

    public static function getLastInsertedID()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayTemplates(string $Image, string $Thumbnail, int $Type, int $Version = 0)
    {
        return self::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail,
            'type' => $Type,
            'version' => $Version
        ]);
    }

    public static function insertBulkBirthdayTemplates(array $Data)
    {
        return self::insert($Data);
    }

    public static function updateBirthdayTemplate(int $ID, string $Image = null, string $Thumbnail = null, int $Type = null, int $Version = null)
    {
        $BirthdayTemplete = self::findOrFail($ID);
        if (!is_null($Image)) $BirthdayTemplete->image = $Image;
        if (!is_null($Thumbnail)) $BirthdayTemplete->thumbnail = $Thumbnail;
        if (!is_null($Type)) $BirthdayTemplete->type = $Type;
        if (!is_null($Version)) $BirthdayTemplete->version = $Version;
        return $BirthdayTemplete->save();
    }

    public static function deleteBirthdayTemplateByID(int $ID)
    {
        return self::where('id', $ID)->delete();
    }

    public static function deleteAllBirthdayTemplates()
    {
        return self::query()->update(['deleted_at' => now()]);
    }

    public static function restoreBirthdayTempleteByID(int $ID)
    {
        return self::where('id', $ID)->restore();
    }

    public static function restoreAllBirthdayTempletes()
    {
        return self::query()->restore();
    }
}
