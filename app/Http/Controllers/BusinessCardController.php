<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use SebastianBergmann\Type\ObjectType;
use Spatie\Browsershot\Browsershot;

class BusinessCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('google-ads');
    }

    public function getImgURL(object $Img)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        // $this->ex_thumbnail->storeAs('public/images', $this->ex_thumbnail_url);
        // dd($ImgName);
        // Storage::disk('public')->put('images/', $Img);
        // Storage::disk('public')->put('images/' . $ImgName, file_get_contents($Img));
        // $temporaryUrl = Storage::disk('public')->put($ImgName, $Img);
        $ImgURL = url('/storage') . '/' . Storage::disk('public')->putFileAs('images', $Img, $ImgName);
        // echo '<a href="' . $ImgURL . '">' . $ImgURL . '</a>';
        // exit;
        return $ImgURL;

        //     <a
        // href="F:\laragon\www\grace-canvas\public\storage/images/1685340351_Ellipse_372.png">F:\laragon\www\grace-canvas\public\storage/images/1685340351_Ellipse_372.png</a>
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Req, BusinessCard $BusinessCard, string $CardSide)
    {
        // try {
        //     return CustomResponseClass::JsonResponse(
        //         $data = Exercise::fetchExercisesByCatId($cat_id),
        //         config('messages.SUCCESS_CODE'),
        //         (empty($data)) ? config('messages.NO_RECORD') : '',
        //         config('messages.HTTP_SUCCESS_CODE')
        //     );
        // } catch (Exception $error) {
        //     report($error);
        //     return CustomResponseClass::JsonResponse(
        //         [],
        //         config('messages.FAILED_CODE'),
        //         $error->getMessage(),
        //         config('messages.HTTP_SERVER_ERROR_CODE')
        //     );
        // }
        try {
            // dd($CardSide);
            $CardId = $Req->CardId;
            $Logo = $this->getImgURL($Req->Logo);
            $FName = $Req->FName;
            $LName = $Req->LName;
            $Designation = $Req->Designation;
            $Company = $Req->Company;
            $TagLine = $Req->TagLine;
            $Address = $Req->Address;
            $Phone = $Req->Phone;
            $Website = $Req->Website;
            $Email = $Req->Email;
            $Template = '2/2_' . $CardSide;
            // $CardBack = '1/1_back';
            // dd($Template);

            $CardContent = view('business_cards.' . $Template, compact('Logo', 'FName', 'LName', 'Designation', 'Company', 'TagLine', 'Address', 'Phone', 'Website', 'Email'));
            // $CardContent = view('business_cards.' . $CardBack, compact('Logo','FName', 'LName', 'Designation', 'Company', 'TagLine', 'Address', 'Phone', 'Website', 'Email'));
            // Create a response with the file content
            return Response::make($CardContent, 200, [
                'Content-Type' => 'text/html',
            ]);

            // $image = Browsershot::url('https://laravel.com/docs/10.x/')->setNodeBinary('PATH %~dp0;%PATH%;')->bodyHtml();
            // F:\laragon\bin\nodejs\node-v18\node.exe
            // $image = Browsershot::url('https://laravel.com/docs/10.x/')->setNodeBinary('F:/laragon/bin/nodejs/node-v18/node.exe')->bodyHtml();
            // dd($image);
            // $cardContent = View::make('business_cards.' . $card_name, compact('f_name', 'l_name', 'designation', 'phone', 'email', 'website', 'address'))->render();
            // dd($cardContent);

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
    public function show(Request $Req, BusinessCard $businessCard)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessCard $businessCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Req, BusinessCard $businessCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessCard $businessCard)
    {
        //
    }
}
