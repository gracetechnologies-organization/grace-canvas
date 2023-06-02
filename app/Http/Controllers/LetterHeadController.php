<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class LetterHeadController extends Controller
{
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
            // dd($CardSide);
            // $Template = '2/2_' . $CardSide;
            // $CardBack = '1/1_back';
            $Template = '1/1_letterhead';
            // dd($Template);

            // $CardContent = view('letterheads.' . $Template);

            // Create a new Dompdf instance
            $dompdf = new Dompdf();

            // Render the view and get its contents
            $html = View::make('letterheads.' . $Template)->render();
            // $html = view('letterheads.' . $Template);

            // dd($html);
            // Load the HTML into Dompdf
            $dompdf->loadHtml($html);

            // Set any additional options for Dompdf if needed
            $dompdf->setPaper('A4', 'portrait');

            // Render the PDF
            $dompdf->render();

            // Output the PDF to the browser
            $dompdf->stream();

            // Create a response with the file content
            // return Response::make($CardContent, 200, [
            //     'Content-Type' => 'text/html',
            // ]);
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
