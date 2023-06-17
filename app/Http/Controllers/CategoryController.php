<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CustomHelpers;
use Exception;
use Illuminate\Http\Request;
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
                'Name' => 'required|string'
            ]);
            if ($Validator->fails()) {
                return response()->macroJson(
                    [],
                    config('messages.FAILED_CODE'),
                    $Validator->errors(),
                    config('messages.HTTP_UNPROCESSABLE_DATA')
                );
            }
            $Inserted = Category::insertCategory($Req->Name);
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

    public function store(Request $request)
    {
        //
    }

    public function show(Request $Req)
    {
        try {
            if ($Req->CatID) {
                return response()->macroJson(
                    $Data = [Category::getCategoryByID($Req->CatID)->toArray()],
                    config('messages.SUCCESS_CODE'),
                    empty($Data) ? config('messages.NO_RECORD') : '',
                    config('messages.HTTP_SUCCESS_CODE')
                );
            }
            $Categories = Category::getCategories();
            $Data = [];
            foreach ($Categories as $Category) {
                array_push($Data, [
                    'id' => $Category->id,
                    'name' => $Category->name,
                    'created_at' => $Category->created_at,
                    'updated_at' => $Category->updated_at,
                    'deleted_at' => $Category->deleted_at
                ]);
            }
            return response()->macroJson(
                (empty($Data)) ? [] : $Data,
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

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
