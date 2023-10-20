<?php

namespace App\Http\Controllers;

use App\Models\BirthdayCake;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class BirthdayCakeController extends Controller
{
    public function upload(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'Image' => 'required|mimes:jpg,png|max:500',
            'Thumbnail' => 'required|mimes:jpg,png|max:100'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }

        $LastInsertedId =  BirthdayCake::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $Image = CustomHelpers::getBirthdayCakeImgWithID($Req->Image, $LastInsertedId);
        $Thumbnail = CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'birthday_cakes/thumbnails/');
        $Inserted = BirthdayCake::insertBirthdayCake($Image, $Thumbnail);
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
                'Images.*' => 'required|mimes:jpg,png|max:500',
                'Thumbnails.*' => 'required|mimes:jpg,png|max:100'
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
                $LastInsertedId =  BirthdayCake::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                $Image = CustomHelpers::getBirthdayCakeImgWithID($Image, $LastInsertedId);
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'birthday_cakes/thumbnails/');
                $BulkData[] = ['image' => $Image, 'thumbnail' => $ThisThumbnail];
            }
            $Inserted = BirthdayCake::insertBulkBirthdayCakes($BulkData);
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
                'Image' => 'mimes:jpg,png|max:500',
                'Thumbnail' => 'mimes:jpg,png|max:100'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Image = (!is_null($Req->Image)) ? CustomHelpers::getBirthdayCakeImgWithID($Req->Image, $Req->ID) : null;
            $Thumbnail = (!is_null($Req->Thumbnail)) ? CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'birthday_cakes/thumbnails/') : null;
            $Updated = BirthdayCake::updateBirthdayCake($Req->ID, $Image, $Thumbnail);
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
                $Deleted = BirthdayCake::deleteBirthdayCakeByID($Req->ID);
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
            $Deleted = BirthdayCake::deleteAllBirthdayCakes();
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
                $Restored = BirthdayCake::restoreBirthdayCakeByID($Req->ID);
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
            $Restored = BirthdayCake::restoreAllBirthdayCakes();
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
                $Data = Cache::rememberForever('getBirthdayCakeByID' . $Req->ID, function () use ($Req) {
                    return  BirthdayCake::getBirthdayCakeByID($Req->ID);
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
            $BirthdayCakes = BirthdayCake::getBirthdayCakes();
            $Data = [];
            foreach ($BirthdayCakes as $BirthdayCake) {
                array_push($Data, [
                    "id" => $BirthdayCake->id,
                    "image" => url('/storage/images/birthday_cakes') . '/' . $BirthdayCake->image,
                    "thumbnail" => url('/storage/images/birthday_cakes/thumbnails') . '/' . $BirthdayCake->thumbnail
                ]);
            }
            return response()->macroJsonExtention(
                $Data,
                'pagination',
                (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($BirthdayCakes)],
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
