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

    public function create(Request $Req, BusinessCard $BusinessCard, string $CardSide)
    {
        try {
            $Validator = Validator::make($Req->all(), [
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
            $Company = (str_word_count($Req->Company) > 1) ? CustomHelpers::converInto2IndexArray($Req->Company) : $Req->Company;
            $TagLine = $Req->TagLine;
            $Address = $Req->Address;
            $Phone = $Req->Phone;
            $Website = $Req->Website;
            $Email = $Req->Email;
            $Color = ($Req->Color) ? $Req->Color : null;

            $BusinessCard = BusinessCard::getBusinessCardByID($Req->CardID);
            $ThisTemplate = ($CardSide === 'front') ? $BusinessCard->front_svg . $CardSide : $BusinessCard->back_svg . $CardSide;
            // $Template = $BusinessCard->front_svg . $CardSide;
            // $CardBack = '1/1_back';
            // dd($ThisTemplate);  
            $CardView = view('business_cards.' . $ThisTemplate, compact('Logo', 'FName', 'LName', 'Designation', 'Company', 'TagLine', 'Address', 'Phone', 'Website', 'Email', 'Color'));
            // Create a response with the file content
            return response()->macroView(
                $CardView,
                config('messages.HTTP_SERVER_ERROR_CODE'),
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

    public function show()
    {
        try {
            $BusinessCards = BusinessCard::getBusinessCards();
            $Data = [];
            foreach ($BusinessCards as $Card) {
                array_push($Data, (object)[
                    'id' => $Card->id,
                    'front_image' => url('/storage/images') . '/' . $Card->front_image,
                    'back_image' => url('/storage/images') . '/' . $Card->back_image,
                    'cteated_at' => $Card->created_at,
                    'updated_at' => $Card->updated_at,
                    'deleted_at' => $Card->deleted_at
                ]);
            }
            return response()->macroJson(
                $Data,
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
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

    public function edit(BusinessCard $businessCard)
    {
        //
    }

    public function update(Request $Req, BusinessCard $businessCard)
    {
        //
    }

    public function destroy(BusinessCard $businessCard)
    {
        //
    }
}
