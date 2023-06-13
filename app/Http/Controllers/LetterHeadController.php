<?php

namespace App\Http\Controllers;

use App\Models\LetterHead;
use App\Services\CustomHelpers;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class LetterHeadController extends Controller
{

    public function collectionsTestCode()
    {
        // $flights = LetterHead::chunkById(2, function (Collection $flights) {
        //     // dd($flights->each->update(['deleted_at' => '2023-06-07 13:10:17']));
        //     $flights->each->update(['front_svg' => 'test data']);
        // }, $column = 'id');

    //     Flight::where('departed', true)
    // ->chunkById(200, function (Collection $flights) {
    //     $flights->each->update(['departed' => false]);
    // }, $column = 'id');

        // LetterHead::chunk(2, function (Collection $flights) {
        //     dd($flights);
        //     // $flights->each->update(['departed' => false]);
        // });

        // $flights = LetterHead::lazy();
        // foreach (LetterHead::lazy() as $flight) print_r($flight);
        
        $flights = LetterHead::all() ;

        dd($flights->contains(33));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getImgURL(object $Img)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        return url('/storage') . '/' . Storage::disk('public')->putFileAs('images', $Img, $ImgName);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Logo' => 'required|mimes:png,jpg|max:1000',
                'Company' => 'required|string',
                'TagLine' => 'string',
                'Address' => 'required|string',
                'Phone_1' => 'required|string',
                'Phone_2' => 'string',
                'Website' => 'string',
                'Email' => 'required|email'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }

            $Logo = CustomHelpers::getImgURL($Req->Logo);
            $Company = (str_word_count($Req->Company) > 1) ? CustomHelpers::converInto2IndexArray($Req->Company) : $Req->Company;
            $TagLine = $Req->TagLine;
            $Address = CustomHelpers::convertAddressIntoArray($Req->Address);
            $Phone_1 = $Req->Phone_1;
            $Phone_2 = $Req->Phone_2;
            $Website = $Req->Website;
            $Email = $Req->Email;
            $Color = ($Req->Color) ? $Req->Color : null;

            $LetterHead = LetterHead::getLetterHeadByID($Req->ID);
            $ThisTemplate = $LetterHead->front_svg . 'letter_heads';
            $LetterHeadView = view('letter_heads.' . $ThisTemplate, compact('Logo', 'Company', 'TagLine', 'Address', 'Phone_1', 'Phone_2', 'Website', 'Email', 'Color'));
            // Create a response with the file content
            return response()->macroView(
                $LetterHeadView,
                config('messages.HTTP_SERVER_ERROR_CODE'),
                ['Content-Type' => 'text/html']
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $Req)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $Req)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
