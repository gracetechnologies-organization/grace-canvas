<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use Exception;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{

    public function index()
    {
        //
    }

    public function edit(Wallpaper $wallpaper)
    {
        //
    }

    public function destroy(Request $Req)
    {
        try {
            $Deleted = Wallpaper::deleteWallpaper($Req->ID);
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
