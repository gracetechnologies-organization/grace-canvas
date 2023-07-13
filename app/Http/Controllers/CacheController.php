<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

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

    public function destroy(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'cache_key' => 'required|string'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Destroyed = Cache::forget($Req->cache_key);
            return response()->macroJson(
                [],
                ($Destroyed) ? config('messages.SUCCESS_CODE') : config('messages.FAILED_CODE'),
                ($Destroyed) ? config('messages.CACHE_DESTROYED_SUCCESS') : config('messages.CACHE_DESTROYED_FAILED'),
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
