<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use App\Models\Category;
use App\Models\LetterHead;
use App\Models\Resume;
use App\Models\Wallpaper;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplatesController extends Controller
{

    public function index()
    {
        // 
    }

    public function create()
    {
        //
    }

    public function store(Request $Req)
    {
        try {
            switch ($Req->Type) {
                case 'business_cards':
                    return $this->storeBusinessCard($Req);
                case 'letter_heads':
                    return $this->storeLetterHead($Req);
                case 'wallpapers':
                    return $this->storeWallpaper($Req);
                case 'resumes':
                    return $this->storeResume($Req);
                default:
                    return response()->macroJson(
                        [],
                        config('messages.FAILED_CODE'),
                        config('messages.TYPE_NA'),
                        config('messages.HTTP_SUCCESS_CODE')
                    );
            }
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

    public function storeBusinessCard(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'FrontImage' => 'required|mimes:png,jpg|max:500',
            'BackImage' => 'required|mimes:png,jpg|max:500',
            'FrontSvg' => 'required|mimes:svg',
            'BackSvg' => 'required|mimes:svg'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }
        $LastInsertedId =  BusinessCard::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $LastInsertedId, 'front');
        $BackImage = CustomHelpers::getImgNameWithID($Req->BackImage, $LastInsertedId, 'back');
        $FrontSvg = CustomHelpers::getViewPathWithID($Req->FrontSvg, $Req->Type, $LastInsertedId, 'front');
        $BackSvg = CustomHelpers::getViewPathWithID($Req->BackSvg, $Req->Type, $LastInsertedId, 'back');
        $Inserted = BusinessCard::insertBusinessCard($FrontImage, $BackImage, $FrontSvg, $BackSvg);
        if ($Inserted) {
            return response()->macroJson(
                [],
                config('messages.SUCCESS_CODE'),
                config('messages.INSERTION_SUCCESS'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        }
        return response()->macroJson(
            [],
            config('messages.FAILED_CODE'),
            config('messages.INSERTION_FAILED'),
            config('messages.HTTP_SUCCESS_CODE')
        );
    }

    public function storeLetterHead(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'FrontImage' => 'required|mimes:png,jpg|max:500',
            'FrontSvg' => 'required|mimes:svg'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }
        $LastInsertedId =  LetterHead::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $LastInsertedId);
        $FrontSvg = CustomHelpers::getViewPathWithID($Req->FrontSvg, $Req->Type, $LastInsertedId);
        $Inserted = LetterHead::insertLetterHead($FrontImage, $FrontSvg);
        if ($Inserted) {
            return response()->macroJson(
                [],
                config('messages.SUCCESS_CODE'),
                config('messages.INSERTION_SUCCESS'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        }
        return response()->macroJson(
            [],
            config('messages.FAILED_CODE'),
            config('messages.INSERTION_FAILED'),
            config('messages.HTTP_SUCCESS_CODE')
        );
    }

    public function storeWallpaper(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'FrontImage' => 'required|mimes:png,jpg|max:500',
            'Type' => 'required|integer',
            'CatID' => 'required|integer'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }
        $FrontImage = CustomHelpers::getWallpaperImgName($Req->FrontImage);
        $Inserted = Wallpaper::insertWallpaper($FrontImage, $Req->Type, $Req->CatID);
        if ($Inserted) {
            return response()->macroJson(
                [],
                config('messages.SUCCESS_CODE'),
                config('messages.INSERTION_SUCCESS'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        }
        return response()->macroJson(
            [],
            config('messages.FAILED_CODE'),
            config('messages.INSERTION_FAILED'),
            config('messages.HTTP_SUCCESS_CODE')
        );
    }

    public function storeBulkWallpapers(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'FrontImages.*' => 'required|mimes:png,jpg|max:500',
                'Type' =>  'required|integer',
                'CatID' => 'required|integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            foreach ($Req->file('FrontImages') as $Image) {
                $FrontImage = CustomHelpers::getWallpaperImgName($Image);
                $Inserted = Wallpaper::insertWallpaper($FrontImage, $Req->Type, $Req->CatID);
            }
            if ($Inserted) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.INSERTION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.INSERTION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
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

    public function storeResume(Request $Req)
    {
        $Validator = Validator::make($Req->all(), [
            'FrontImage' => 'required|mimes:png,jpg|max:500',
            'FrontSvg' => 'required|mimes:svg',
            'Version' => 'required|integer'
        ]);
        if ($Validator->fails()) {
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Validator->errors(),
                config('messages.HTTP_UNPROCESSABLE_DATA')
            );
        }
        $LastInsertedId =  Resume::getLastInsertedID();
        $LastInsertedId = ($LastInsertedId === 0) ? 1 : ++$LastInsertedId;
        $FrontImage = CustomHelpers::getImgNameWithID($Req->FrontImage, $LastInsertedId);
        $FrontSvg = CustomHelpers::getViewPathWithID($Req->FrontSvg, $Req->Type, $LastInsertedId);
        $Inserted = Resume::insertResume($FrontImage, $FrontSvg, $Req->Version);
        if ($Inserted) {
            return response()->macroJson(
                [],
                config('messages.SUCCESS_CODE'),
                config('messages.INSERTION_SUCCESS'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        }
        return response()->macroJson(
            [],
            config('messages.FAILED_CODE'),
            config('messages.INSERTION_FAILED'),
            config('messages.HTTP_SUCCESS_CODE')
        );
    }

    public function show()
    {
        // 
    }

    public function showBusinessCards()
    {
        try {
            $BusinessCards = BusinessCard::getBusinessCards();
            $Data = [];
            foreach ($BusinessCards as $Card) {
                array_push($Data, [
                    'id' => $Card->id,
                    'front_image' => url('/storage/images') . '/' . $Card->front_image,
                    'back_image' => url('/storage/images') . '/' . $Card->back_image,
                    'created_at' => $Card->created_at,
                    'updated_at' => $Card->updated_at,
                    'deleted_at' => $Card->deleted_at
                ]);
            }
            return response()->macroJsonExtention(
                $Data,
                'pagination',
                (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($BusinessCards)],
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
                config('messages.HTTP_SUCCESS_CODE')
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

    public function showLetterHeads()
    {
        try {
            $LetterHeads = LetterHead::getLetterHeads();
            $Data = [];
            foreach ($LetterHeads as $Letter) {
                array_push($Data, [
                    'id' => $Letter->id,
                    'front_image' => url('/storage/images') . '/' . $Letter->front_image,
                    'created_at' => $Letter->created_at,
                    'updated_at' => $Letter->updated_at,
                    'deleted_at' => $Letter->deleted_at
                ]);
            }
            return response()->macroJsonExtention(
                $Data,
                'pagination',
                (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($LetterHeads)],
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
                config('messages.HTTP_SUCCESS_CODE')
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

    public function showWallpapersByCatID(array $Category)
    {
        $Wallpapers = Category::getWallpapersOfCategory($Category['id']);
        // dd($Wallpapers);
        $Data = [];
        foreach ($Wallpapers as $Wallpaper) {
            array_push($Data, [
                'id' => $Wallpaper->id,
                'front_image' => url('/storage/wallpapers') . '/' . $Wallpaper->front_image,
                'type' => $Wallpaper->type,
                'created_at' => $Wallpaper->created_at,
                'updated_at' => $Wallpaper->updated_at,
                'deleted_at' => $Wallpaper->deleted_at,
                'category' => $Category
            ]);
        }
        return ['data' => $Data, 'pagination' => $Wallpapers];
    }

    public function showWallpapers(Request $Req)
    {
        try {
            if ($Req->CatID) {
                $Category = Category::getCategoryByID($Req->CatID);
                $Data = $this->showWallpapersByCatID($Category);
                // return response()->macroJsonExtention(
                //     (empty($Data['data'])) ? [] : $Data['data'],
                //     'pagination',
                //     (empty($Data['data'])) ? [] : [CustomHelpers::getPaginationKeys($Data['pagination'])],
                //     config('messages.SUCCESS_CODE'),
                //     (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                //     config('messages.HTTP_SUCCESS_CODE')
                // );
                return response()->macroJson(
                    (empty($Data['data'])) ? [] : $Data['data'],
                    config('messages.SUCCESS_CODE'),
                    (empty($Data['data'])) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            $Wallapapers = Wallpaper::getWallpapers();
            $Data = [];
            foreach ($Wallapapers as $Wallpaper) {
                array_push($Data, [
                    'id' => $Wallpaper->id,
                    'front_image' => url('/storage/wallpapers') . '/' . $Wallpaper->front_image,
                    'type' => $Wallpaper->type,
                    'created_at' => $Wallpaper->created_at,
                    'updated_at' => $Wallpaper->updated_at,
                    'deleted_at' => $Wallpaper->deleted_at,
                    'category' => $Wallpaper->categories
                ]);
            }
            // return response()->macroJsonExtention(
            //     $Data,
            //     'pagination',
            //     (empty($Data)) ? [] : [CustomHelpers::getPaginationKeys($Wallapapers)],
            //     config('messages.SUCCESS_CODE'),
            //     (empty($Data)) ? config('messages.NO_RECORD') : '',
            //     config('messages.HTTP_SUCCESS_CODE')
            // );
            return response()->macroJson(
                    $Data,
                    config('messages.SUCCESS_CODE'),
                    (empty($Data)) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
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

    public function showCategoriesWallpapers(Request $Req)
    {
        try {
            $Categories = Category::getCategoriesWithWallpapers(($Req->CatID) ? $Req->CatID : null);
            $Data = [];
            foreach ($Categories as $Category) {
                array_push($Data, [
                    'id' => $Category->id,
                    'name' => $Category->name,
                    'description' => $Category->description,
                    'image' => url('/storage/images') . '/' . $Category->image,
                    'created_at' => $Category->created_at,
                    'updated_at' => $Category->updated_at,
                    'deleted_at' => $Category->deleted_at,
                    'wallpapers' => CustomHelpers::getOnlyWallpapers($Category->wallpapers, $Category->name),
                    'previews' => CustomHelpers::getOnlyPreviews($Category->wallpapers, $Category->name),
                ]);
            }
            return response()->macroJson(
                $Data,
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
                config('messages.HTTP_SUCCESS_CODE')
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

    public function edit()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
