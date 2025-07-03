<?php

namespace App\Http\Controllers\ApiControllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use UploadImageTrait;

    public function register(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file_name = $this->saveImages($request->user_image, 'images/user/user_image');


        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'user_image' => $file_name,
        ]);

        $imageUrl = $file_name ? url('images/user/user_image/' . $file_name) : null;

        return response()->json([
            'status'  => true,
            'message' => 'User registered successfully',
            'user'    => [
                'id'         => $user->id,
                'name'       => $user->name,
                'email'      => $user->email,
                'image'      => $imageUrl,
            ],
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        $imageUrl = $user->user_image ? url('images/user/user_image/' . $user->user_image) : null;

        return response()->json([
            'status'  => true,
            'message' => 'Login successful',
            'token'   => $token,
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'image' => $imageUrl,
            ],
        ], 200);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        
        $imageUrl = $user->user_image ? url('images/user/user_image/' . $user->user_image) : null;
    
        return response()->json([
            'status' => true,
            'user' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'image' => $imageUrl,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
        ]);
    }
}
