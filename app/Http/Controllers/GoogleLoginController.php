<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;
use Extension;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mailer\Transport\Dsn;

class GoogleLoginController extends Controller
{
    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->getEmail())->first();
            if (!$finduser) {
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId(),
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
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
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function linkdInPage()
    {
        try {
            return Socialite::driver('linkedin')->redirect();
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function linkdInCallBack()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            $finduser = User::where('linkedin_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('user.dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'password' => encrypt('my-linkedin')
                ]);

                Auth::login($newUser);

                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        // try {
        //     $user = Socialite::driver('linkedin')->user();
        //     $finduser = User::where('email', $user->getEmail())->first();
        //     if (!$finduser) {
        //         $saveUser = User::updateOrCreate(
        //             [
        //                 'linkedin_id' => $user->getId()
        //             ],
        //             [
        //                 'name' => $user->getName(),
        //                 'email' => $user->getEmail(),
        //                 'password' => Hash::make($user->getName() . '@' . $user->getId()),
        //             ]
        //         );
        //     } else {
        //         $saveUser = User::where('email', $user->getEmail())->update([
        //             'linkedin_id' => $user->getId(),
        //         ]);
        //         $saveUser = User::where('email', $user->getEmail())->first();
        //     }

        //     Auth::loginUsingId($saveUser->id);

        //     return redirect()->route('user.dashboard');
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
