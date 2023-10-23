<?php

namespace App\Http\Controllers;

use App\Models\BirthdayTemplates;
use App\Models\Sticker;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class StickerController extends Controller
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

        $LastInsertedId =  Sticker::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $Image = CustomHelpers::getStickerImgWithID($Req->Image, $LastInsertedId);
        $Thumbnail = CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'stickers/thumbnails/');
        $Inserted = Sticker::insertSticker($Image, $Thumbnail);
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
                $LastInsertedId =  Sticker::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                $Image = CustomHelpers::getStickerImgWithID($Image, $LastInsertedId);
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'stickers/thumbnails/');
                $BulkData[] = ['image' => $Image, 'thumbnail' => $ThisThumbnail];
            }
            $Inserted = Sticker::insertBulkStickers($BulkData);
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
                'Thumbnail' => 'mimes:jpg,png|max:150'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Image = (!is_null($Req->Image)) ? CustomHelpers::getStickerImgWithID($Req->Image, $Req->ID) : null;
            $Thumbnail = (!is_null($Req->Thumbnail)) ? CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'stickers/thumbnails/') : null;
            $Updated = Sticker::updateSticker($Req->ID, $Image, $Thumbnail);
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
                $Deleted = Sticker::deleteStickerByID($Req->ID);
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
            $Deleted = Sticker::deleteAllStickers();
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
                $Restored = Sticker::restoreStickerByID($Req->ID);
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
            $Restored = Sticker::restoreAllStickers();
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
                $Data = Cache::rememberForever('getStickerByID' . $Req->ID, function () use ($Req) {
                    return  Sticker::getStickerByID($Req->ID);
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
            $Stickers = Sticker::getStickers();
            $Data = [];
            foreach ($Stickers as $Sticker) {
                array_push($Data, [
                    "id" => $Sticker->id,
                    "image" => url('/storage/stickers') . '/' . $Sticker->image,
                    "thumbnail" => url('/storage/stickers/thumbnails') . '/' . $Sticker->thumbnail
                ]);
            }
            return response()->macroJsonExtention(
                $Data,
                'pagination',
                (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($Stickers)],
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
