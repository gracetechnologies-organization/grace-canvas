<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CustomHelpers
{
    public static function getImgURL(object $Img)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        return url('/storage') . '/' . Storage::disk('public')->putFileAs('images', $Img, $ImgName);
    }

    public static function getImgNameWithID(object $Img, int $ID, string $Side = null)
    {
        $ImgName = $ID . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        if (!is_null($Side)) $ImgName = $Side . '_' . $ImgName; 
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        Storage::disk('public')->putFileAs('images', $Img, $ImgName);
        return $ImgName;
    }

    public static function getViewPathWithID(object $Svg, string $Type, int $ID, string $Side = null)
    {
        // Get the SVG content
        $SvgContent = $Svg->getContent();
        // Generate directory name
        $DirectoryPath = resource_path('views/' . $Type . '/' . $ID);
        // Create the directory if it doesn't exist
        File::makeDirectory($DirectoryPath, 0755, true, true);
        // Generate the blade file name
        $FileName = $ID . '_' . $Side . '.blade.php';
        // Set the file path
        $FilePath = $DirectoryPath . '/' . $FileName;
        // Write the SVG content into the blade file
        File::put($FilePath, $SvgContent);
        // Returning the final path where the view file is generated
        return $ID . '/' . $ID . '_';
    }

    public static function converInto2IndexArray(string $string)
    {
        $words = explode(' ', $string);
        // Get the last word of the string
        $lastWord = end($words);
        // Remove the last word from the array
        $wordsWithoutLast = array_slice($words, 0, -1);
        // Create the final array with the desired indexes
        $array = [
            implode(' ', $wordsWithoutLast), // Index 0: All words except the last one
            $lastWord // Index 1: Last word
        ];
        return $array;
    }
}
