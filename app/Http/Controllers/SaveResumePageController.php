<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\SaveResumePage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaveResumePageController extends Controller
{
    public function save(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                // 'UserID' => 'required|integer',
                'RequestedTemplateID' => 'required|integer',
                // 'FormData' => 'required|string',
                'PageCode' => 'required|string'
            ]);
            if ($Validator->fails()) echo "ValidationFailed: " . $Validator->errors();

            $FrontImage = Resume::getResumeByID($Req->RequestedTemplateID)->front_image;
            // saveResume(int $UserID, $ResumeID, $FrontImage, $FormData, $PageCode)
            $Saved = SaveResumePage::savePage(1, $Req->RequestedTemplateID, $FrontImage, '$Req->FormData', $Req->PageCode);
            if ($Saved) {
                return "SavedSuccessfully";
            }
            return "ErrorInSaving";
        } catch (Exception $error) {
            report($error);
            echo "ServerError: " . $error->getMessage();
        }
    }
}
