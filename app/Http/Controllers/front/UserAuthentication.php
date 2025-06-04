<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserAuthentication extends Controller
{
    use UploadImageTrait;


    public function user_register()
    {
        return view('front.auth.register');
    }

    public function store_user(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:users,name',
                'email' => 'required|unique:users,email',
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'required|string|min:3|max:8|confirmed',

            ]
        );

        $file_name = $this->saveImages($request->user_image, 'images/user/user_image');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'user_image' => $file_name
        ]);

        auth()->login($user);

        return redirect()->route('app');
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('app');
    }

    public function show_login_page()
    {
        return view('front.auth.login');
    }

    public function user_login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
        );

        if (!Auth::guard('web')->attempt(
            $this->credentials($request)
        )) {

            return redirect()->route('show_login')->with('error', 'Wrong Data!');
        }
        return redirect()->route('app');
    }

    public function username()
    {
        return 'email';
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }


    public function User_profile($id)
    {

        $id = auth('web')->id();
        $user = User::find($id);
        return view('front.profile', compact('user'));
    }
    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:3|max:8|confirmed',
        ]);



        $user = User::find($id);
        if ($request->hasFile('user_image')) {
            File::delete(public_path('images/user/user_image/' . $user->user_image));
            $newFilename = $this->saveImages($request->file('user_image'), 'images/user/user_image');

            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_image = $newFilename ?? $user->user_image;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();


        return redirect()->back()->with('success', 'Your profile  " ' . $user->name . ' "  updated successfully!');
    }
}
