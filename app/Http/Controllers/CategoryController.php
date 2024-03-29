<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Name' => 'required|string|unique:categories,name',
                'Description' => 'required|string',
                'Image' => 'required|mimes:png,jpg|max:50',
                'ParentCatID' => 'required|integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Inserted = Category::insertCategory($Req->Name, $Req->Description, CustomHelpers::saveImgAndGetName($Req->Image), $Req->ParentCatID);
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
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function edit(Request $Req)
    {
        try {
            $Validator = Validator::make($Req->all(), [
                'Name' => 'string|unique:categories,name',
                'Description' => 'string',
                'Image' => 'mimes:png,jpg|max:50',
                'ParentCatID' => 'integer'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Image = (!is_null($Req->Image)) ? CustomHelpers::saveImgAndGetName($Req->Image) : null;
            $Updated = Category::updateCategory($Req->ID, $Req->Name, $Req->Description, $Image, $Req->ParentCatID);
            if ($Updated) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.UPDATION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.UPDATION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function destroy(Request $Req)
    {
        try {
            $Deleted = Category::deleteCategory($Req->ID);
            if ($Deleted) {
                return response()->macroJson(
                    [],
                    config('messages.SUCCESS_CODE'),
                    config('messages.DELETION_SUCCESS'),
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                config('messages.DELETION_FAILED'),
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }

    public function show(Request $Req)
    {
        try {
            if ($Req->ID) {
                return response()->macroJson(
                    $Data = [Category::getCategoryByID($Req->ID)],
                    config('messages.SUCCESS_CODE'),
                    empty($Data) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }

            if ($Req->ParentCatID) {
                $Data = Cache::remember('showCategories' . $Req->ParentCatID, now()->addDays(30), function () use ($Req) {
                    $Categories = Category::getCategoriesByParentCatID($Req->ParentCatID);
                    $Data = [];
                    foreach ($Categories as $SingleIndex) {
                        array_push($Data, [
                            'id' => $SingleIndex->id,
                            'name' => $SingleIndex->name,
                            "description" => $SingleIndex->description,
                            "image" => url('/storage/images') . '/' . $SingleIndex->image,
                            'parent_cat_id' => $SingleIndex->parent_cat_id
                        ]);
                    }
                    return $Data;
                });
                return response()->macroJson(
                    (empty($Data)) ? [] : $Data,
                    config('messages.SUCCESS_CODE'),
                    (empty($Data)) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }

            $Data = Cache::remember('showCategories', now()->addDays(30), function () {
                $Categories = Category::getCategories();
                $Data = [];
                foreach ($Categories as $SingleIndex) {
                    array_push($Data, [
                        'id' => $SingleIndex->id,
                        'name' => $SingleIndex->name,
                        "description" => $SingleIndex->description,
                        "image" => url('/storage/images') . '/' . $SingleIndex->image,
                        'parent_cat_id' => $SingleIndex->parent_cat_id
                    ]);
                }
                return $Data;
            });
            return response()->macroJson(
                (empty($Data)) ? [] : $Data,
                config('messages.SUCCESS_CODE'),
                (empty($Data)) ? config('messages.NO_RECORD') : '',
                config('messages.HTTP_SUCCESS_CODE')
            );
        } catch (Exception $Error) {
            report($Error);
            return response()->macroJson(
                [],
                config('messages.FAILED_CODE'),
                $Error->getMessage(),
                config('messages.HTTP_SERVER_ERROR_CODE')
            );
        }
    }
}
