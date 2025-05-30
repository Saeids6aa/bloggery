<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
        );

        if (!Auth::guard('admin')->attempt(
            $this->credentials($request)
        )) {

            return back()->withErrors([
                'message' => 'Wrong Password Or Email'
            ]);
        }
        return redirect()->route('dashboard');
    }

    public function username()
    {
        return 'email';
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
