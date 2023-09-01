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
            'FrontImage' => 'required|mimes:webp,jpg,png|max:500',
            'Svg' => 'required|mimes:svg,jpg,png',
            'Version' => 'required|integer',
            'Default' => 'required|integer',
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
        $FrontImage = CustomHelpers::getBirthdayTemplateImgWithID($Req->FrontImage, $LastInsertedId);
        $FrontSvg = CustomHelpers::getViewPathWithIDBirthdayTemplates($Req->Svg, $LastInsertedId);
        $Inserted = BirthdayTemplates::insertBirthdayTemplates($FrontImage, $FrontSvg, $Req->Version, $Req->Default);
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

    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImage' => 'mimes:jpg,png',
                'svg' => 'mimes:svg',
                'version' => 'integer',
                'default' => 'integer',
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $FrontImage = (!is_null($Req->FrontImage)) ? CustomHelpers::getBirthdayTemplateImgWithID($Req->FrontImage, $Req->ID) : null;
            $FrontSvg = (!is_null($Req->svg)) ? CustomHelpers::getViewPathWithIDBirthdayTemplates($Req->svg, $Req->ID) : null;
            $Updated = BirthdayTemplates::updateBirthdayTempletes($Req->ID, $FrontImage, $FrontSvg, $Req->version, $Req->default);
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
        } catch (Exception $error) {
            report($error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }
    
    public function create(Request $Req)
    {
        try {
            // $Validator = Validator::make($Req->all(), [
            //     'FrontImage' => 'mimes:jpg,png',
            //     'svg' => 'mimes:svg',
            //     'version' => 'integer',
            //     'default' => 'integer',
            // ]);
            // if ($Validator->fails()) {
            //     return response()->macroJson(
            //         [],
            //         config('messages.FAILED_CODE'),
            //         $Validator->errors(),
            //         config('messages.HTTP_UNPROCESSABLE_DATA')
            //     );
            // }

            // $image = $Req->file('image');
            // $LastInsertedId =  BirthdayTemplates::getLastInsertedID();
            // $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
            // $image = CustomHelpers::getBirthdayTemplateImgWithID($image, $LastInsertedId);

            // dd('I am running');
            // Load the main image
            $mainImage = Image::make(url('/storage/images/birthday_templates') . '/' . '2_Group_61.png');
            
            dd($mainImage);
            // Detect transparent area
            $mask = $mainImage->mask();
            $transparentArea = $mask->crop()->getWidthAndHeight();
            // Load the replacement image
            $replacementImage = Image::make('http://127.0.0.1:8000/storage/images/Asset%2011.png');
            $replacementImage->resize($transparentArea['width'], $transparentArea['height']);

            // Replace transparent area with replacement image
            $mainImage->insert($replacementImage, 'top-left', 0, 0);

            // Save the resulting image
            $mainImage->save('http://127.0.0.1:8000/storage/images/birthday_templates/new_birthday_template.png');

            // return response()->macroJson(
            //     [],
            //     config('messages.FAILED_CODE'),
            //     config('messages.UPDATION_FAILED'),
            //     config('messages.HTTP_SUCCESS_CODE')
            // );
        } catch (Exception $error) {
            report($error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function destroy(Request $Req)
    {
        try {
            if ($Req->ID) {
                $Deleted = BirthdayTemplates::deleteBirthdayTemplate($Req->ID);
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
        } catch (Exception $error) {
            report($error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function restore(Request $Req)
    {
        try {
            if ($Req->ID) {
                $Restored = BirthdayTemplates::restoreBirthdayTemplete($Req->ID);
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
        } catch (Exception $error) {
            report($error);
            return response()->macroJson(
                [],
                config('messages.RESTORE_FAILED'),
                $error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }
}