<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $comments = Comment::latest()->take(5)->get();
        $contacts = contact::latest()->take(5)->get();
        return view('dashboard', compact('contacts', 'comments'));
    }
}
