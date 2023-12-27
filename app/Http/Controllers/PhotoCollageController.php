<?php

namespace App\Http\Controllers;

use App\Models\PhotoCollage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Support\Facades\Validator;


class PhotoCollageController extends Controller
{
    public function upload(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'Image' => 'required|mimes:jpg,png|max:800',
            'Thumbnail' => 'required|mimes:jpg,png|max:150'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }

        $LastInsertedId =  PhotoCollage::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $Image = CustomHelpers::getPhotoCollageImgWithID($Req->Image, $LastInsertedId);
        $Thumbnail = CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'PhotoCollages/thumbnails/');
        $Inserted = PhotoCollage::insertInfo($Image, $Thumbnail);
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
    }
    
    public function uploadBulk(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Images.*' => 'required|mimes:jpg,png|max:800',
                'Thumbnails.*' => 'required|mimes:jpg,png|max:150'
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
                $LastInsertedId =  PhotoCollage::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                $Image = CustomHelpers::getPhotoCollageImgWithID($Image, $LastInsertedId);
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'PhotoCollages/thumbnails/');
                $BulkData[] = ['image' => $Image, 'thumbnail' => $ThisThumbnail];
            }
            $Inserted = PhotoCollage::insertBulkInfo($BulkData);
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
                'Image' => 'mimes:jpg,png|max:800',
                'Thumbnail' => 'mimes:jpg,png|max:150',
                'Dimensions' => 'json'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Image = (!is_null($Req->Image)) ? CustomHelpers::getPhotoCollageImgWithID($Req->Image, $Req->ID) : null;
            $Thumbnail = (!is_null($Req->Thumbnail)) ? CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'PhotoCollages/thumbnails/') : null;
            $Updated = PhotoCollage::updateInfo($Req->ID, $Image, $Thumbnail, $Req->Dimensions);
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
            if ($Req->ID) {
                $Deleted = PhotoCollage::deleteInfo($Req->ID);
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
            }
            $Deleted = PhotoCollage::deleteAllInfo();
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
                $Restored = PhotoCollage::restoreInfoByID($Req->ID);
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
            $Restored = PhotoCollage::restoreAllInfo();
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

    public function show(Request $Req)
    {
        try {
            if ($Req->ID) {
                $Data = Cache::rememberForever('getPhotoCollageByID' . $Req->ID, function () use ($Req) {
                    return  PhotoCollage::getInfoByID($Req->ID);
                });
                return response()->macroJson(
                    $Data,
                    config('messages.SUCCESS_CODE'),
                    (empty($Data)) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            /* 
            * Here we can't use cache bcz then pagination will not work properly 
            */
            $PhotoCollages = PhotoCollage::getAllInfo();
            $Data = [];
            foreach ($PhotoCollages as $PhotoCollage) {
                array_push($Data, [
                    "id" => $PhotoCollage->id,
                    "image" => url('/storage/PhotoCollages') . '/' . $PhotoCollage->image,
                    "thumbnail" => url('/storage/PhotoCollages/thumbnails') . '/' . $PhotoCollage->thumbnail,
                    "dimensions" => json_decode($PhotoCollage->dimensions)
                ]);
            }
            return response()->macroJsonExtention(
                $Data,
                'pagination',
                (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($PhotoCollages)],
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
