<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\categoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    //
    public function index()
   {
        $categories = Category::paginate(5); 
        return categoryResource::collection($categories);
    }
public function show($id)
{
    $category = Category::find($id);

    if (! $category) {
        return response()->json([
            'status' => false,
            'message' => 'Category not found',
        ], 404);
    }

    return new CategoryResource($category);
}

     public function destroy($id)
    {
        $Category = Category::find($id);

        if (! $Category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found',
            ], 404);
        }


        $Category->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Category deleted successfully',
        ], 200);
    }

    
}
