<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\SaveResumePage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $Saved = SaveResumePage::savePage(Auth::id(), $Req->RequestedTemplateID, $FrontImage, '$Req->FormData', $Req->PageCode);
            if ($Saved) {
                return "SavedSuccessfully";
            }
            return "ErrorInSaving";
        } catch (Exception $error) {
            report($error);
            echo "ServerError: " . $error->getMessage();
        }
    }

    public function updateResume(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'RequestedPageID' => 'required|integer',
                'PageCode' => 'required|string'
            ]);
            if ($Validator->fails()) {
                return response()->json(['error' => 'ValidationFailed', 'message' => $Validator->errors()], 400);
            }

            $Updated = SaveResumePage::updatePage($Req->RequestedPageID, $Req->PageCode);
            if ($Updated) {
                return response()->json(['message' => 'SavedSuccessfully'], 200);
            }
            return response()->json(['error' => 'ErrorInSaving'], 500);
        } catch (Exception $error) {
            dd($error);
            return response()->json(['error' => 'ServerError', 'message' => $error->getMessage()], 500);
        }
    }
}
