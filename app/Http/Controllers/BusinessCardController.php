<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessCardController extends Controller
{
    public function index()
    {
        // return view('google-ads');
    }

    public function create(Request $Req, string $CardSide)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'ID' => 'required|integer',
                'Logo' => 'required|mimes:png,jpg|max:1000',
                'FName' => 'string',
                'LName' => 'string',
                'Designation' => 'string',
                'TagLine' => 'string',
                'Address' => 'string',
                'Phone' => 'string',
                'Website' => 'string',
                'Email' => 'email'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }

            $Logo = CustomHelpers::getImgURL($Req->Logo);
            $FName = $Req->FName;
            $LName = $Req->LName;
            $Designation = $Req->Designation;
            $Company = (str_word_count($Req->Company) > 1) ? CustomHelpers::convertInto2IndexArray($Req->Company) : $Req->Company;
            $TagLine = $Req->TagLine;
            $Address = $Req->Address;
            $Phone = $Req->Phone;
            $Website = $Req->Website;
            $Email = $Req->Email;
            $Color = ($Req->Color) ? $Req->Color : null;

            $BusinessCard = BusinessCard::getBusinessCardByID($Req->ID);
            $ThisTemplate = ($CardSide === 'front') ? $BusinessCard->front_svg . $CardSide : $BusinessCard->back_svg . $CardSide;
            $CardView = view('business_cards.' . $ThisTemplate, compact('Logo', 'FName', 'LName', 'Designation', 'Company', 'TagLine', 'Address', 'Phone', 'Website', 'Email', 'Color'));
            // Create a response with the file content
            return response()->macroView(
                $CardView,
                config('messages.HTTP_SUCCESS_CODE'),
                ['Content-Type' => 'text/html']
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

    public function show()
    {
       
    }
    
    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImage' => 'required|mimes:png,jpg|max:500',
                'BackImage' => 'required|mimes:png,jpg|max:500',
                'FrontSvg' => 'required|mimes:svg',
                'BackSvg' => 'required|mimes:svg'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $Req->CardID, 'front');
            $BackImage = CustomHelpers::getImgNameWithID($Req->BackImage, $Req->CardID, 'back');
            /*
            |--------------------------------------------------------------------------
            | Here we are using "getViewPathWithID()" function only to update the svg 
            | Content present in the blade file
            |--------------------------------------------------------------------------
            */
            CustomHelpers::getViewPathWithID($Req->FrontSvg, 'business_cards', $Req->CardID, 'front');
            CustomHelpers::getViewPathWithID($Req->BackSvg, 'business_cards', $Req->CardID, 'back');

            $Updated = BusinessCard::updateBusinessCard($Req->CardID, $FrontImage, $BackImage);
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

    public function destroy(Request $Req)
    {
        try {
            $Deleted = BusinessCard::deleteBusinessCard($Req->CardID);
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
}
