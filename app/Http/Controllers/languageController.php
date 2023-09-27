<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class languageController extends Controller
{

    // public function showSavedTemplate($ID)
    // {
    //     // dd($ID);
    //     $Data = DB::table('saved_resumes')
    //         ->select('template_code')
    //         ->where('id', $ID)
    //         ->get();

    //     // dd($Data);
    //     $SavedTemplate = $Data[0]->template_code;

    //     return view('saved_resumes.saved-resume', compact('SavedTemplate'));
    // }

    // public function index()
    // {
    //     // Check if languages are already cached
    //     $languages = Cache::get('languages');

    //     if (!$languages) {
    //         // If not found in cache, create an array of languages
    //         $languages = [
    //             'zh' => 'China',
    //             'fr' => 'France',
    //             'es' => 'Spanish',
    //             'ur' => 'Urdu',
    //             'de' => 'Danish',
    //             'id' => 'Indonesian',
    //             'it' => 'Italian',
    //             'nl' => 'Dutch',
    //             'no' => 'Norwegian',
    //             'pl' => 'Polish',
    //             'pt' => 'Portuguese',
    //             'sv' => 'Swedish',
    //             'ru' => 'Russian',
    //             'tr' => 'Turkish',
    //         ];

    //         // Store languages in cache
    //         Cache::put('languages', $languages, 1440);
    //     }

    //     return view('language', ['languages' => $languages]);
    // }

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

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 600);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            dd($errorMessage);
        }

        curl_close($ch);
    }
}
