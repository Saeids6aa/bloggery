<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class usersControlleroller extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $users = DB::table('users')->paginate(12);
        return view('users.index', compact('users'));
        // ->with([
        //     'users' => $users
        // ]);

    }

// public function profile($id)
// {
//     $admin = User::find($id); 
//     return view('users.profile', compact('users'));
// }
    public function create()
    {
        return view('users.add_users');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:users,name',
                'email' => 'required|unique:users,email',
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'required|string|min:3|max:12|confirmed',

            ]
        );

        // dd($request->all());
        $file_name = $this->saveImages($request->user_image, 'images/user/user_image');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_image' => $file_name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users')->with('success', 'user added successfully!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users')->with('error', 'user Not Found!');
        }

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:3|max:8|confirmed',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('user_image')) {
            if ($user->user_image && file_exists(public_path('images/user/user_image/' . $user->user_image))) {
                unlink(public_path('images/user/user_image/' . $user->user_image));
            }

            $image = $request->file('user_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/user/user_image'), $imageName);
            $user->user_image = $imageName;
        }

        $user->save();
        return redirect()->route('users')->with('success', 'user " ' . $user->name . ' " updated successfully!');
    }


    public function delete($id)
    {

        $user = user::find($id);
        File::delete(public_path('images/posts/image/' . $user->user_image));

        if (!$user) {
            return redirect()->route('users')->with('error', 'user Not Found!');
        }

        $user->delete();
        return redirect()->route('users')->with('success', 'user deleted successfully!');
    }
}
