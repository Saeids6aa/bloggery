<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $admins = DB::table('admins')->paginate(5);
        return view('admins.index')->with([
            'admins' => $admins
        ]);
    }
    public function create()
    {
        return view('admins.add_admin');
    }

    public function store(Request $request)
    {
        Admin::Admin_validation($request);

        $file_name = $this->saveImages($request->admin_image, 'images/admin/admin_image');

        Admin::create([
            'admin_name' => $request->admin_name,
            'email' => $request->email,
            'role' => $request->role,
            'admin_image' => $file_name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admins')->with('success', 'Admin added successfully!');
    }
}
