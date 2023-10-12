<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $Req)
    {
        // 
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
        // 
    }

    public function destroy()
    {
        try {
            $Destroyed = Cache::flush();
            return response()->macroJson(
                [],
                ($Destroyed) ? config('messages.SUCCESS_CODE') : config('messages.FAILED_CODE'),
                ($Destroyed) ? config('messages.CACHE_DESTROYED_SUCCESS') : config('messages.CACHE_DESTROYED_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }
}
