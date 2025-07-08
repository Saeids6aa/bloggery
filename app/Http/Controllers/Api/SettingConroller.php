<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingConroller extends Controller
{

    public function index()
    { 
        $Settings = Setting::all();
        return SettingResource::collection($Settings);
    }


   
    
    }
