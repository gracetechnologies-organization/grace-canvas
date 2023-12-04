<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallpaper;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class WallpaperController extends Controller
{

    public function index()
    {
        //
    }

    public function uploadBulk(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImages.*' => 'mimes:jpg,png|max:500',
                'Thumbnails.*' => 'mimes:jpg,png|max:200',
                'Type' =>  'required|integer',
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
            if (count($Req->file('Thumbnails')) != count($Req->file('FrontImages'))) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    config('messages.ARRAYS_NOT_EQUAL'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            foreach ($Req->file('FrontImages') as $Key => $Image) {
                $FrontImage = CustomHelpers::getWallpaperImgName($Image);
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'wallpapers/thumbnails/', 'webp');
                $BulkData[] = ['front_image' => $FrontImage, 'thumbnail' => $ThisThumbnail, 'type' => $Req->Type, 'cat_id' => $Req->CatID];
            }
            $Inserted = Wallpaper::insertBulkWallpapers($BulkData);
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
                'FrontImage' => 'mimes:png,jpg|max:500',
                'Type' => 'integer',
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
            $FrontImage = ($Req->FrontImage) ? CustomHelpers::getWallpaperImgName($Req->FrontImage) : null;
            $Updated = Wallpaper::updateWallpaper($Req->ID, $FrontImage, $Req->Type, $Req->CatID);
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
                $Deleted = Wallpaper::deleteWallpapersByCatID($Req->CatID, $Req->Type);
            else
                $Deleted = Wallpaper::deleteWallpaper($Req->ID);

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

    public function showWallpapers(Request $Req)
    {
        try {
            if ($Req->CatID) {
                $Data = Cache::remember('showWallpapers' . $Req->CatID, now()->addDays(30), function () use ($Req) {
                    $Category = Category::getCategoryByID($Req->CatID);
                    return $this->showWallpapersByCatID($Category);
                });
                // return response()->macroJsonExtention(
                //     (empty($Data['data'])) ? [] : $Data['data'],
                //     'pagination',
                //     (empty($Data['data'])) ? [] : [CustomHelpers::getPaginationKeys($Data['pagination'])],
                //     config('messages.SUCCESS_CODE'),
                //     (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                //     config('messages.HTTP_SUCCESS_CODE')
                // );
                return response()->macroJson(
                    (empty($Data['data'])) ? [] : $Data['data'],
                    config('messages.SUCCESS_CODE'),
                    (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }

            $Data = Cache::remember('showWallpapers', now()->addDays(30), function () {
                $Wallapapers = Wallpaper::getWallpapers();
                $Data = [];
                foreach ($Wallapapers as $Wallpaper) {
                    array_push($Data, [
                        'id' => $Wallpaper->id,
                        'front_image' => url('/storage/wallpapers') . '/' . $Wallpaper->front_image,
                        'thumbnail' => url('/storage/wallpapers/thumbnails') . '/' . $Wallpaper->thumbnail,
                        'type' => $Wallpaper->type,
                        'created_at' => $Wallpaper->created_at,
                        'updated_at' => $Wallpaper->updated_at,
                        'deleted_at' => $Wallpaper->deleted_at,
                        'category' => $Wallpaper->categories
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

    public function showCategoriesWallpapers(Request $Req)
    {
        try {
            if ($Req->CatID) {
                $Data = Cache::remember('showCategoriesWallpapers' . $Req->CatID, now()->addDays(30), function () use ($Req) {
                    $Categories = Category::getCategoriesWithWallpapers($Req->CatID);
                    $Data = [];
                    foreach ($Categories as $Category) {
                        array_push($Data, [
                            'id' => $Category->id,
                            'name' => $Category->name,
                            'description' => $Category->description,
                            'image' => url('/storage/images') . '/' . $Category->image,
                            'created_at' => $Category->created_at,
                            'updated_at' => $Category->updated_at,
                            'deleted_at' => $Category->deleted_at,
                            'wallpapers' => CustomHelpers::getOnlyWallpapers($Category->wallpapers, $Category->name),
                            'previews' => CustomHelpers::getOnlyPreviews($Category->wallpapers, $Category->name),
                        ]);
                    }
                    return $Data;
                });
            } else {
                $Data = Cache::remember('showCategoriesWallpapers', now()->addDays(30), function () {
                    $Categories = Category::getCategoriesWithWallpapers();
                    $Data = [];
                    foreach ($Categories as $Category) {
                        array_push($Data, [
                            'id' => $Category->id,
                            'name' => $Category->name,
                            'description' => $Category->description,
                            'image' => url('/storage/images') . '/' . $Category->image,
                            'created_at' => $Category->created_at,
                            'updated_at' => $Category->updated_at,
                            'deleted_at' => $Category->deleted_at,
                            'wallpapers' => CustomHelpers::getOnlyWallpapers($Category->wallpapers, $Category->name),
                            'previews' => CustomHelpers::getOnlyPreviews($Category->wallpapers, $Category->name),
                        ]);
                    }
                    return $Data;
                });
            }
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
}
