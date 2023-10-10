<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    private const GOOGLE_DRIVER = 'google';
    
    public function googlePage()
    {
        try {
            return Socialite::driver(static::GOOGLE_DRIVER)->redirect();
        } catch (Exception $error) {
            report($error);
            dd($error->getMessage());
        }        
    }

    public function googleCallBack()
    {
        try {
            $user = Socialite::driver(static::GOOGLE_DRIVER)->user();
            
            $finduser = User::where('email', $user->getEmail())->first();
            if (!$finduser) {
                $saveUser = User::create(
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'google_id' => $user->getId(),
                        'password' => Hash::make($user->getName() . '@' . $user->getId()),
                    ]
                );
            } else {
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('user.dashboard.home');
        } catch (Exception $error) {
            report($error);
            dd($error->getMessage());
        }
    }
}
