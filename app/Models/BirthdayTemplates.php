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

    public static function getBirthdayTemplateByID(int $ID)
    {
        $birthdayTemplates = BirthdayTemplates::findOrFail($ID);
        return [
            "id" => $birthdayTemplates->id,
            "image" => url('/storage/images/birthday_templates') . '/' . $birthdayTemplates->image,
            "thumbnail" => $birthdayTemplates->thumbnail,
            "type" => $birthdayTemplates->type,
            "version" => $birthdayTemplates->version
        ];
    }

    // public static function getDefaultBirthdayTemplate()
    // {
    //     $birthdayTemplates = BirthdayTemplates::where('default', 1)->first();
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

    public static function getBirthdayTemplates()
    {
        return BirthdayTemplates::inRandomOrder()->paginate(4);
    }

    public static function getLastInsertedID()
    {
        return BirthdayTemplates::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayTemplates(string $Image, string $Thumbnail, int $Type, int $Version = 0)
    {
        return BirthdayTemplates::create([
            'image' => $Image,
            'thumbnail' => $Thumbnail,
            'type' => $Type,
            'version' => $Version
        ]);
    }

    public static function updateBirthdayTempletes(int $ID, string $Image = null, string $Thumbnail = null, int $Type = null, int $Version = null)
    {
        $BirthdayTemplete = BirthdayTemplates::findOrFail($ID);
        if (!is_null($Image)) $BirthdayTemplete->image = $Image;
        if (!is_null($Thumbnail)) $BirthdayTemplete->thumbnail = $Thumbnail;
        if (!is_null($Type)) $BirthdayTemplete->type = $Type;
        if (!is_null($Version)) $BirthdayTemplete->version = $Version;
        return $BirthdayTemplete->save();
    }

    public static function deleteBirthdayTemplateByID(int $ID)
    {
        return BirthdayTemplates::where('id', $ID)->delete();
    }

    public static function deleteAllBirthdayTemplates()
    {
        return BirthdayTemplates::query()->update(['deleted_at' => now()]);
    }

    public static function restoreBirthdayTempleteByID(int $ID)
    {
        return BirthdayTemplates::where('id', $ID)->restore();
    }

    public static function restoreAllBirthdayTempletes()
    {
        return BirthdayTemplates::query()->restore();
    }
}
