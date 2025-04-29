<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        $admins = DB::table('admins')->paginate(2);
        return view('admins.index')->with([
            'admins' => $admins
        ]);
    }
}
