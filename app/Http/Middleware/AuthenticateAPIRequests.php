<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAPIRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (!$request->header('token'))
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    config('messages.TOEKN_NOT_PROVIDED'),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );

            if ($request->header('token') == '99640a15-7bfa-4c23-90f7-b634acb14dc3')
                return $next($request);
            else
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    config('messages.TOKEN_INVALID'),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
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
