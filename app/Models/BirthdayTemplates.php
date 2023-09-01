<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthdayTemplates extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'front_image',
        'svg',
        'version',
        'default',
    ];

    public static function getBirthdayTemplateByID(int $ID)
    {
        $birthdayTemplates = BirthdayTemplates::findOrFail($ID);
        return [
            "id" => $birthdayTemplates->id,
            "front_image" => url('/storage/images/birthday_templates') . '/' . $birthdayTemplates->front_image,
            "svg" => $birthdayTemplates->svg,
            'version' => $birthdayTemplates->version,
            'default' => $birthdayTemplates->default,
            "created_at" => $birthdayTemplates->created_at,
            "updated_at" => $birthdayTemplates->updated_at,
            "deleted_at" => $birthdayTemplates->deleted_at
        ];
    }

    public static function getDefaultBirthdayTemplate()
    {
        $birthdayTemplates = BirthdayTemplates::where('default', 1)->first();
        return [
            "id" => $birthdayTemplates->id,
            "front_image" => url('/storage/images/birthday_templates') . '/' . $birthdayTemplates->front_image,
            "svg" => $birthdayTemplates->svg,
            'version' => $birthdayTemplates->version,
            'default' => $birthdayTemplates->default,
            "created_at" => $birthdayTemplates->created_at,
            "updated_at" => $birthdayTemplates->updated_at,
            "deleted_at" => $birthdayTemplates->deleted_at
        ];
    }

    public static function getBirthdayTemplates()
    {
        return BirthdayTemplates::inRandomOrder()->paginate(4);
    }

    public static function getLastInsertedID()
    {
        return BirthdayTemplates::orderByDesc('id')->first()->id ?? 0;
    }

    public static function insertBirthdayTemplates(string $FrontImage, string $FrontSvg, int $Version = 0, int $Default = 0)
    {
        return BirthdayTemplates::create([
            'front_image' => $FrontImage,
            'svg' => $FrontSvg,
            'version' => $Version,
            'default' => $Default,
        ]);
    }

    public static function updateBirthdayTempletes(int $ID, string $FrontImage = null, string $FrontSvg = null, int $version = null, int $default = null)
    {
        $BirthdayTemplete = BirthdayTemplates::findOrFail($ID);
        if (!is_null($FrontImage)) $BirthdayTemplete->front_image = $FrontImage;
        if (!is_null($FrontSvg)) $BirthdayTemplete->svg =  $FrontSvg;
        if (!is_null($version)) $BirthdayTemplete->version = $version;
        if (!is_null($default)) $BirthdayTemplete->default = $default;
        return $BirthdayTemplete->save();
    }

    public static function deleteBirthdayTemplate(int $ID)
    {
        return BirthdayTemplates::where('id', $ID)->delete();
    }

    public static function deleteAllBirthdayTemplates()
    {
        return BirthdayTemplates::query()->update(['deleted_at' => now()]);
    }

    public static function restoreBirthdayTemplete(int $ID)
    {
        return BirthdayTemplates::where('id', $ID)->restore();
    }

    public static function restoreAllBirthdayTempletes()
    {
        return BirthdayTemplates::query()->restore();
    }
}
