<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClockWallpaper;
use App\Models\Wallpaper;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ClockWallpaperController extends Controller
{

    public function uploadBulk(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Images.*' => 'mimes:webp|max:800',
                'Thumbnails.*' => 'mimes:webp|max:200',
                'CatID' => 'required|integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            if (count($Req->file('Thumbnails')) != count($Req->file('Images'))) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    config('messages.ARRAYS_NOT_EQUAL'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            foreach ($Req->file('Images') as $Key => $Image) {
                $ImageName = CustomHelpers::saveCompressReturnImgName($Image, 'clock/wallpapers/');
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'clock/wallpapers/thumbnails/');
                $BulkData[] = ['image' => $ImageName, 'thumbnail' => $ThisThumbnail, 'cat_id' => $Req->CatID];
            }
            $Inserted = ClockWallpaper::insertBulkInfo($BulkData);
            if ($Inserted) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.INSERTION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.INSERTION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Image' => 'mimes:webp|max:800',
                'Thumbnail' => 'mimes:webp|max:200',
                'CatID' => 'integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $ImageName = ($Req->Image) ? CustomHelpers::saveCompressReturnImgName($Req->Image, 'clock/wallpapers/') : null;
            $ThisThumbnail = ($Req->Thumbnail) ? CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'clock/wallpapers/thumbnails/') : null;
            $Updated = ClockWallpaper::updateInfo($Req->ID, $ImageName, $ThisThumbnail, $Req->CatID);
            if ($Updated) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.UPDATION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.UPDATION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function destroy(Request $Req)
    {
        try {
            if ($Req->CatID)
                $Deleted = ClockWallpaper::deleteInfoByCatID($Req->CatID);
            else if ($Req->ID)
                $Deleted = ClockWallpaper::deleteInfo($Req->ID);

            if ($Deleted) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.DELETION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.DELETION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function restore(Request $Req)
    {
        try {
            if ($Req->ID) {
                $Restored = ClockWallpaper::restoreInfoByID($Req->ID);
                if ($Restored) {
                    return response()->macroJson(
                        [],
                        config('messages.SUCCESS_CODE'),
                        config('messages.RESTORE_SUCCESS'),
                        config('messages.HTTP_SUCCESS_CODE')
                    );
                }
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    config('messages.RESTORE_FAILED'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            $Restored = ClockWallpaper::restoreAllInfo();
            if ($Restored) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.RESTORE_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.RESTORE_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.RESTORE_FAILED'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function showClockWallpapersByCatID(array $Category)
    {
        $ClockWallpapers = Category::getClockWallpapersOfCategory($Category['id']);
        $Data = [];
        foreach ($ClockWallpapers as $SingleIndex) {
            array_push($Data, [
                'id' => $SingleIndex->id,
                'image' => url('/storage/clock/wallpapers') . '/' . $SingleIndex->image,
                'thumbnail' => url('/storage/clock/wallpapers/thumbnails') . '/' . $SingleIndex->thumbnail,
                // 'category' => $Category
            ]);
        }
        return ['data' => $Data, 'pagination' => $ClockWallpapers];
    }

    public function show(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'CatID' => 'sometimes|required|integer',
                'page' => 'sometimes|required|integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            if ($Req->CatID && $Req->page) {
                $Data = Cache::remember('showClockWallpapers' . $Req->CatID . $Req->page, now()->addDays(30), function () use ($Req) {
                    $Category = Category::getCategoryByID($Req->CatID);
                    return $this->showClockWallpapersByCatID($Category);
                });
                return response()->macroJsonExtention(
                    (empty($Data['data'])) ? [] : $Data['data'],
                    'pagination',
                    (empty($Data['data'])) ? [] : [CustomHelpers::getPaginationKeys($Data['pagination'])],
                    config('messages.SUCCESS_CODE'),
                    (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
                // return response()->macroJson(
                //     (empty($Data['data'])) ? [] : $Data['data'],
                //     config('messages.SUCCESS_CODE'),
                //     (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                //     config('messages.HTTP_SUCCESS_CODE')
                // );
            }

            $Data = Cache::remember('showClockWallpapers', now()->addDays(30), function () {
                $ClockWallpapers = ClockWallpaper::getAll();
                $Data = [];
                foreach ($ClockWallpapers as $SingleIndex) {
                    array_push($Data, [
                        'id' => $SingleIndex->id,
                        'image' => url('/storage/clock/wallpapers') . '/' . $SingleIndex->front_image,
                        'thumbnail' => url('/storage/clock/wallpapers/thumbnails') . '/' . $SingleIndex->thumbnail,
                        'category' => $SingleIndex->categories
                    ]);
                }
                return $Data;
            });
            // return response()->macroJsonExtention(
            //     $Data,
            //     'pagination',
            //     (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($Wallapapers)],
            //     config('messages.SUCCESS_CODE'),
            //     (empty($Data)) ? config('messages.NO_RECORD') : '',
            //     config('messages.HTTP_SUCCESS_CODE')
            // );
            return response()->macroJson(
                $Data,
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    // public function showCategoriesWallpapers(Request $Req)
    // {
    //     try {
    //         if ($Req->CatID) {
    //             $Data = Cache::remember('showCategoriesWallpapers' . $Req->CatID, now()->addDays(30), function () use ($Req) {
    //                 $Categories = Category::getCategoriesWithWallpapers($Req->CatID);
    //                 $Data = [];
    //                 foreach ($Categories as $Category) {
    //                     array_push($Data, [
    //                         'id' => $Category->id,
    //                         'name' => $Category->name,
    //                         'description' => $Category->description,
    //                         'image' => url('/storage/images') . '/' . $Category->image,
    //                         'wallpapers' => CustomHelpers::getOnlyWallpapers($Category->wallpapers, $Category->name),
    //                         'previews' => CustomHelpers::getOnlyPreviews($Category->wallpapers, $Category->name),
    //                     ]);
    //                 }
    //                 return $Data;
    //             });
    //         } else {
    //             $Data = Cache::remember('showCategoriesWallpapers', now()->addDays(30), function () {
    //                 $Categories = Category::getCategoriesWithWallpapers();
    //                 $Data = [];
    //                 foreach ($Categories as $Category) {
    //                     array_push($Data, [
    //                         'id' => $Category->id,
    //                         'name' => $Category->name,
    //                         'description' => $Category->description,
    //                         'image' => url('/storage/images') . '/' . $Category->image,
    //                         'wallpapers' => CustomHelpers::getOnlyWallpapers($Category->wallpapers, $Category->name),
    //                         'previews' => CustomHelpers::getOnlyPreviews($Category->wallpapers, $Category->name),
    //                     ]);
    //                 }
    //                 return $Data;
    //             });
    //         }
    //         return response()->macroJson(
    //             $Data,
    //             config('messages.SUCCESS_CODE'),
    //             (empty($Data)) ? config('messages.NO_RECORD') : '',
    //             config('messages.HTTP_SUCCESS_CODE')
    //         );
    //     } catch (Exception $Error) {
    //         report($Error);
    //         return response()->macroJson(
    //             [],
    //             config('messages.FAILED_CODE'),
    //             $Error->getMessage(),
    //             config('messages.HTTP_SERVER_ERROR_CODE')
    //         );
    //     }
    // }
}
