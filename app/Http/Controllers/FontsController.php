<?php

namespace App\Http\Controllers;

use App\Models\Fonts;
use Illuminate\Http\Request;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class FontsController extends Controller
{
    public function upload(Request $Req)
    {

        $Validator = Validator::make($Req->all(), [
                'File' => 'required|file',
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }
        $LastInsertedId =  Fonts::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $File = CustomHelpers::getFontsImgWithID($Req->File, $LastInsertedId);
        $Inserted = Fonts::insertFont($File);
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
                'Files.*' => 'required|file',
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            foreach ($Req->file('Files') as $Key => $File) {
                $LastInsertedId =  Fonts::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                $File = CustomHelpers::getFontsImgWithID($File, $LastInsertedId);
                $BulkData[] = ['file' => $File];
            }
            $Inserted = Fonts::insertBulkFonts($BulkData);
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
                'File' => 'file',
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $File = (!is_null($Req->File)) ? CustomHelpers::getFontsImgWithID($Req->File, $Req->ID) : null;
            $Updated = Fonts::updateFonts($Req->ID, $File);
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
                $Deleted = Fonts::deleteFontsByID($Req->ID);
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
            $Deleted = Fonts::deleteAllFonts();
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
                $Restored = Fonts::restoreFontsByID($Req->ID);
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
            $Restored = Fonts::restoreAllFonts();
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

    public function show(Request $Req , $ID=null)
    {
        try {
            if ($Req->ID) {
                $Data = Cache::rememberForever('getFontsByID' . $Req->ID, function () use ($Req) {
                    return  Fonts::getFontsByID($Req->ID);
                });
                return response()->macroJson(
                    $Data,
                    config('messages.SUCCESS_CODE'),
                    (empty($Data)) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            /*
            * Here we can't use cache bcz then  will not work properly
            */
            $Fonts = Fonts::getFonts();
            $Data = [];
            foreach ($Fonts as $Font) {
                array_push($Data, [
                    "id" => $Font->id,
                    "file" => url('/storage/fonts') . '/' . $Font->file,
                ]);
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
