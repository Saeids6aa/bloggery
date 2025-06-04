<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $admins = DB::table('admins')->paginate(12);
        return view('admins.index', compact('admins'));
        // ->with([
        //     'admins' => $admins
        // ]);
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

    public function edit($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admins')->with('error', 'Admin Not Found!');
        }

        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required|unique:admins,admin_name,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:admin,super_admin,editor',
            'password' => 'nullable|string|min:3|max:8|confirmed',

        ]);

        $admin = Admin::find($id);

        $admin->admin_name = $request->admin_name;
        $admin->email = $request->email;
        $admin->role = $request->role;

        if ($request->hasFile('admin_image')) {
            if ($admin->admin_image && file_exists(public_path('images/admin/admin_image/' . $admin->admin_image))) {
                unlink(public_path('images/admin/admin_image/' . $admin->admin_image));
            }

            $image = $request->file('admin_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/admin/admin_image'), $imageName);
            $admin->admin_image = $imageName;
        }

        $admin->save();
        return redirect()->route('admins')->with('success', 'Admin " ' . $admin->admin_name . ' " updated successfully!');
    }



    public function delete($id)
    {
        if ($id == auth('admin')->id()) {
            return redirect()->route('admins')->with('error', 'You Con"t Delete Your Current Account!');
        }
        Admin::findOrFail($id)->delete();
        return redirect()->route('admins')->with('success', 'Admin deleted successfully!');
    }



    public function edit_profile($id)
    {
        $id = auth('admin')->id();
        $admin = Admin::find($id);
        return view('admins.profile.update_profile', compact('admin'));
    }



    public function profile($id)
    {
        $id = auth('admin')->id();

        $admin = Admin::find($id);
        return view('admins.profile.profile', compact('admin'));
    }

    public function profile_updete(Request $request, $id)
    {
        $id = auth('admin')->id();

        $request->validate([
            'admin_name' => 'required|unique:admins,admin_name,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:3|max:8|confirmed',

        ]);

        $admin = Admin::find($id);
        if ($request->hasFile('admin_image')) {
            File::delete(public_path('images/admin/admin_image/' . $admin->admin_image));
            $newFilename = $this->saveImages($request->file('admin_image'), 'images/admin/admin_image');

            $admin->admin_name = $request->admin_name;
            $admin->email = $request->email;
            $admin->admin_image = $newFilename ?? $admin->admin_image;
        }


        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();


        return redirect()->back()->with('success', 'yuor profile  " ' . $admin->admin_name . ' "  updated successfully!');
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admins.profile.show', compact('admin'));
    }
}
