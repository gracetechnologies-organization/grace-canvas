<?php

namespace App\Http\Controllers;

use App\Models\BirthdayTemplates;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BirthdayTemplatesController extends Controller
{
    public function upload(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'Image' => 'required|mimes:jpg,png|max:500',
            'Thumbnail' => 'required|mimes:jpg,png|max:100',
            'Type' => 'required|integer',
            'Version' => 'required|integer'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }

        $LastInsertedId =  BirthdayTemplates::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $Image = CustomHelpers::getBirthdayTemplateImgWithID($Req->Image, $LastInsertedId);
        $Thumbnail = CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'birthday_templates/thumbnails/');
        $Inserted = BirthdayTemplates::insertBirthdayTemplates($Image, $Thumbnail, $Req->Type, $Req->Version);
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
                'Images.*' => 'required|mimes:jpg,png|max:1000',
                'Thumbnails.*' => 'required|mimes:jpg,png|max:1000',
                'Type' => 'required|integer',
                'Version' => 'required|integer'
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
                $LastInsertedId =  BirthdayTemplates::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                $Image = CustomHelpers::getBirthdayTemplateImgWithID($Image, $LastInsertedId);
                $ThisThumbnail = CustomHelpers::saveCompressReturnImgName($Req->file('Thumbnails')[$Key], 'birthday_templates/thumbnails/');
                $BulkData[] = ['image' => $Image, 'thumbnail' => $ThisThumbnail, 'type' => $Req->Type, 'version' => $Req->Version];
            }
            $Inserted = BirthdayTemplates::insertBulkBirthdayTemplates($BulkData);
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
                'Thumbnail' => 'mimes:jpg,png|max:100',
                'Type' => 'integer',
                'Version' => 'integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Image = (!is_null($Req->Image)) ? CustomHelpers::getBirthdayTemplateImgWithID($Req->Image, $Req->ID) : null;
            $Thumbnail = (!is_null($Req->Thumbnail)) ? CustomHelpers::saveCompressReturnImgName($Req->Thumbnail, 'birthday_templates/thumbnails/') : null;
            $Updated = BirthdayTemplates::updateBirthdayTemplate($Req->ID, $Image, $Thumbnail, $Req->Type, $Req->Version);
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
    
    // public function create(Request $Req)
    // {
    //     try {
    //         $Validator = Validator::make($Req->all(), [
    //             'FrontImage' => 'required|mimes:jpg,png',
    //             'TemplateID' => 'required|integer',
    //         ]);
    //         if ($Validator->fails()) {
    //             return response()->macroJson(
    //                 [],
    //                 config('messages.FAILED_CODE'),
    //                 $Validator->errors(),
    //                 config('messages.HTTP_UNPROCESSABLE_DATA')
    //             );
    //         }

    //         $FontImage = CustomHelpers::getImgURL($Req->FrontImage);
    //         $BirthdayTemplate = BirthdayTemplates::getBirthdayTemplateByID($Req->TemplateID);
    //         $ThisTemplate = $BirthdayTemplate['svg'] . 'birthday_templates';
    //         $View = view('birthday_templates.' . $ThisTemplate, compact('FontImage'));
    //         // Create a response with the file content
    //         return response()->macroView(
    //             $View,
    //             config('messages.HTTP_SUCCESS_CODE'),
    //             ['Content-Type' => 'text/html']
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

    public function destroy(Request $Req)
    {
        try {
            if ($Req->ID) {
                $Deleted = BirthdayTemplates::deleteBirthdayTemplateByID($Req->ID);
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
            $Deleted = BirthdayTemplates::deleteAllBirthdayTemplates();
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
                $Restored = BirthdayTemplates::restoreBirthdayTempleteByID($Req->ID);
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
            $Restored = BirthdayTemplates::restoreAllBirthdayTempletes();
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
}
