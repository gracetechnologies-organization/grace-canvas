<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $Req)
    {
        try {
            if ($Req->Type == 'business-cards') {
                $validator = Validator::make($Req->all(), [
                    'FrontImage' => 'required|mimes:png,jpg|max:500',
                    'BackImage' => 'required|mimes:png,jpg|max:500',
                    'FrontSvg' => 'required|mimes:svg',
                    'BackSvg' => 'required|mimes:svg'
                ]);
                if ($validator->fails()) {
                    return response()->macroJson(
                        [],
                        config('messages.FAILED_CODE'),
                        $validator->errors(),
                        config('messages.HTTP_SERVER_ERROR_CODE')
                    );
                }
                // $validator = Validator::make($data, [
                //     'has_appointment' => 'required|boolean',
                //     'appointment_date' => 'exclude_if:has_appointment,false|required|date',
                //     'doctor_name' => 'exclude_if:has_appointment,false|required|string',
                // ]);
                $LastInsertedId =  BusinessCard::getLastInsertedID();
                $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
                // dd($LastInsertedId);
                $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $LastInsertedId, 'front');
                $BackImage = CustomHelpers::getImgNameWithID($Req->BackImage, $LastInsertedId, 'back');
                $FrontSvg = CustomHelpers::getViewPathWithID($Req->FrontSvg, $Req->Type, $LastInsertedId, 'front');
                $BackSvg = CustomHelpers::getViewPathWithID($Req->BackSvg, $Req->Type, $LastInsertedId, 'back');
                
                $Inserted = BusinessCard::insertBusinessCard($FrontImage, $BackImage, $FrontSvg, $BackSvg);
                // dd($Inserted);
                if($Inserted){
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
