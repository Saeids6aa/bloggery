<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\About_usResource;
use App\Models\About;
use Illuminate\Http\Request;

class About_usConroller extends Controller
{

public function index(){
        $about = About::all();
         return About_usResource::collection($about);

}


}
