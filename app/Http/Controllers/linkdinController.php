<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class linkdinController extends Controller
{
    const LINKDIN_TYPE = 'linkedin';

    public function linkdInPage()
    {
        try {
            return Socialite::driver(static::LINKDIN_TYPE)->redirect();
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function linkdInCallBack()
    {
        try {
            $user = Socialite::driver(static::LINKDIN_TYPE)->user();

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
    }
}
