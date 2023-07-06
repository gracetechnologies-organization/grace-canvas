<?php

namespace App\Http\Controllers;

use App\Models\LetterHead;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Validator;

class LetterHeadController extends Controller
{
    public function TestingMethod()
    {
       return Process::run('dir')->output();
    }

    public function index()
    {
        //
    }

    public function create(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'ID' => 'required|integer',
                'Logo' => 'required|mimes:png,jpg|max:1000',
                'Company' => 'required|string',
                'TagLine' => 'string',
                'Address' => 'required|string',
                'Phone_1' => 'required|string',
                'Phone_2' => 'string',
                'Website' => 'string',
                'Email' => 'required|email'
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
            $Company = (str_word_count($Req->Company) > 1) ? CustomHelpers::converInto2IndexArray($Req->Company) : $Req->Company;
            $TagLine = $Req->TagLine;
            $Address = CustomHelpers::convertAddressIntoArray($Req->Address);
            $Phone_1 = $Req->Phone_1;
            $Phone_2 = $Req->Phone_2;
            $Website = $Req->Website;
            $Email = $Req->Email;
            $Color = ($Req->Color) ? $Req->Color : null;

            $LetterHead = LetterHead::getLetterHeadByID($Req->ID);
            $ThisTemplate = $LetterHead->front_svg . 'letter_heads';
            $LetterHeadView = view('letter_heads.' . $ThisTemplate, compact('Logo', 'Company', 'TagLine', 'Address', 'Phone_1', 'Phone_2', 'Website', 'Email', 'Color'));
            // Create a response with the file content
            return response()->macroView(
                $LetterHeadView,
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

    public function store(Request $Req)
    {
        //
    }

    public function show(Request $Req)
    {
        // 
    }

    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImage' => 'required|mimes:png,jpg|max:500',
                'FrontSvg' => 'required|mimes:svg'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $Req->ID, 'front');
            /*
            |--------------------------------------------------------------------------
            | Here we are using "getViewPathWithID()" function only to update the svg 
            | Content present in the blade file
            |--------------------------------------------------------------------------
            */
            CustomHelpers::getViewPathWithID($Req->FrontSvg, 'letter_heads', $Req->ID);

            $Updated = LetterHead::updateLetterHead($Req->ID, $FrontImage);
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
            $Deleted = LetterHead::deleteLetterHead($Req->ID);
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
