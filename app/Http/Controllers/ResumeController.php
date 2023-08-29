<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'ID' => 'required|integer',
                'Photo' => 'required|mimes:png,jpg|max:1000',
                'FName' => 'required|string',
                'LName' => 'required|string',
                'Profession' => 'required|string',
                'Phone' => 'required|string',
                'Gender' => 'required|string',
                'MaritalStatus' => 'required|string',
                'Email' => 'required|email',
                'DOB' => 'required|string',
                'Cnic' => 'required|string',
                'Nationality' => 'required|string',
                'Address' => 'required|string',
                'Objective' => 'required|string',
                'Experience' => 'string',
                'Qualification' => 'string',
                'Skills' => 'string',
                'Achievements' => 'string',
                'Projects' => 'string',
                'Interests' => 'string',
                'Languages' => 'string',
                'References' => 'string'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $ID = $Req->ID;
            $Photo = CustomHelpers::getImgURL($Req->Photo);
            $FName = $Req->FName;
            $LName = $Req->LName;
            $Profession = $Req->Profession;
            $Phone = $Req->Phone;
            $Gender = $Req->Gender;
            $MaritalStatus = $Req->MaritalStatus;
            $Email = $Req->Email;
            $DOB = $Req->DOB;
            $Cnic = $Req->Cnic;
            $Address = $Req->Address;
            // $Address = CustomHelpers::convertAddressIntoArray($Req->Address);
            $Nationality = $Req->Nationality;
            $Objective = $Req->Objective;
            // $Objective = CustomHelpers::convertStringIntoLines($Req->Objective, 67, 5);

            $Experience = json_decode($Req->Experience, true);
            // foreach ($Experience as $Index => $Array) $Experience[$Index]['JobDescription'] = CustomHelpers::convertStringIntoLines($Array['JobDescription'], 67, 3);

            $Qualification = json_decode($Req->Qualification, true);
            $Skills = json_decode($Req->Skills, true);
            $Achievements = json_decode($Req->Achievements, true);
            $Projects = json_decode($Req->Projects, true);
            $Interests = json_decode($Req->Interests, true);
            $Languages = json_decode($Req->Languages, true);

            $References = json_decode($Req->References, true);
            // foreach ($References as $Index => $Array) $References[$Index]['Description'] = CustomHelpers::convertStringIntoLines($Array['Description'], 34, 2);

            $Color = ($Req->Color) ? $Req->Color : null;

            $Resume = Resume::getResumeByID($Req->ID);
            $ThisTemplate = $Resume->front_svg . 'resumes';
            $ResumeView = view('resumes.' . $ThisTemplate, compact(
                'Photo',
                'FName',
                'LName',
                'Profession',
                'Phone',
                'Gender',
                'MaritalStatus',
                'Email',
                'DOB',
                'Cnic',
                'Nationality',
                'Address',
                'Objective',
                'Experience',
                'Qualification',
                'Skills',
                'Achievements',
                'Projects',
                'Interests',
                'Languages',
                'References',
            ));
            // Create a response with the file content
            return response()->macroView(
                $ResumeView,
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

    public function show(Resume $resume)
    {
        //
    }

    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImage' => 'mimes:webp|max:400',
                'Version' => 'integer',
                'CatID' => 'integer',
                'Html' => 'mimes:html'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $FrontImage = ($Req->FrontImage) ? CustomHelpers::getResumeImgNameWithID($Req->FrontImage, $Req->ID) : null;
            /*
            |--------------------------------------------------------------------------
            | Here we are using "getViewPathWithID()" function only to update the html 
            | Content present in the blade file
            |--------------------------------------------------------------------------
            */
            if (!is_null($Req->Html)) CustomHelpers::getViewPathWithID($Req->Html, 'resumes', $Req->ID);

            $Updated = Resume::updateResume($Req->ID, $FrontImage, $Req->Version, $Req->CatID);
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
            $Deleted = Resume::deleteResumesByGivenParams($Req->ID, $Req->CatID, $Req->Version);
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
                $Restored = Resume::restoreResume($Req->ID);
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
            $Restored = Resume::restoreAllResumes();
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
                config('messages.FAILED_CODE'),
                $error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }
}
