<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $contacts = contact::paginate(2);
        return view('dashboard', compact('contacts'));
    }
}
