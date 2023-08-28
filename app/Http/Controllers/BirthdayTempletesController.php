<?php

namespace App\Http\Controllers;

use App\Models\BirthdayTempletes;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BirthdayTempletesController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function upload(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'FrontImage' => 'required|mimes:webp,jpg,png|max:500',
            'svg' => 'required|mimes:svg',
            'version' => 'required|integer',
            'default' => 'required|integer',
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }

        $LastInsertedId =  BirthdayTempletes::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $FrontImage = CustomHelpers::getBirthdayTemplateWithID($Req->FrontImage, $LastInsertedId);
        $FrontSvg = CustomHelpers::getViewPathWithIDBirthday($Req->svg, $LastInsertedId);
        $Inserted = BirthdayTempletes::insertBirthdayTempletes($FrontImage, $FrontSvg);
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
            // dd($Req->ID);
            $FrontImage = (!is_null($Req->FrontImage)) ? CustomHelpers::getBirthdayTemplateWithID($Req->FrontImage, $Req->ID) : null;
            $FrontSvg = (!is_null($Req->svg)) ? CustomHelpers::getViewPathWithIDBirthday($Req->svg, $Req->ID) : null;
            $Updated = BirthdayTempletes::updateBirthdayTempletes($Req->ID , $FrontImage,$FrontSvg,$Req->version,$Req->default );
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
}
