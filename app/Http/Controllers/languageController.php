<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

class languageController extends Controller
{

    public function index()
    {
        return redirect()->route('home');
    }

    public function change(Request $Request)
    {

        App::setLocale($Request->lang);

        session()->put('locale', $Request->lang);

        return redirect()->back();
    }

    public function yourMethod(Request $request)
    {
        $url = $request->url();

        $ch = curl_init();

        if (strpos($url, 'home') !== false) {

            curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/');
        } elseif (strpos($url, 'register') !== false) {

            curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/register');
        } elseif (strpos($url, 'login') !== false) {

            curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/login');
        } elseif (strpos($url, 'templates/resume') !== false) {

            curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/templates/resume');
        } else {
            // Handle other URLs or provide a default URL
            // For example, you can set a default URL:
            // curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/');
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 600);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            dd($errorMessage);
        }

        curl_close($ch);
    }
}
