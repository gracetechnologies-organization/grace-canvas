<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LinkedInController extends Controller
{
    private const LINKEDIN_DRIVER = 'linkedin-openid';

    public function linkdInPage()
    {
        try {
            return Socialite::driver(static::LINKEDIN_DRIVER)->redirect();
        } catch (Exception $error) {
            report($error);
            dd($error->getMessage());
        }
    }

    public function linkdInCallBack()
    {
        try {
            $user = Socialite::driver(static::LINKEDIN_DRIVER)->user();
          
            $finduser = User::where('linkedin_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('user.dashboard.home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'password' => encrypt('my-linkedin')
                ]);

                Auth::login($newUser);

                return redirect()->route('user.dashboard.home');
            }
        } catch (Exception $error) {
            report($error);
            dd($error->getMessage());
        }
    }
}
