<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\tagsResource;
use App\Models\tags;
use Illuminate\Http\Request;

class tagsController extends Controller
{

    //
    public function index()
   {
        $tags = tags::paginate(5); 
        return tagsResource::collection($tags);
    }
public function show($id)
{
    $tags = tags::find($id);

    if (! $tags) {
        return response()->json([
            'status' => false,
            'message' => 'tags not found',
        ], 404);
    }

    return new tagsResource($tags);
}

     public function destroy($id)
    {
        $tags = tags::find($id);

        if (! $tags) {
            return response()->json([
                'status'  => false,
                'message' => 'tags not found',
            ], 404);
        }


        $tags->delete();

        return response()->json([
            'status'  => true,
            'message' => 'tags deleted successfully',
        ], 200);
    }

    }
