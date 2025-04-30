<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_name',
        'email',
        'password',
        'admin_image',
        'role',
    ];


    public static function Admin_validation($request)
    {
        $request->validate(
            [
                'admin_name' => 'required|unique:admins,admin_name',
                'email' => 'required|unique:admins,email',
                'admin_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'role' => 'required|in:admin,super_admin,editor',
                'password' => 'required|string|min:3|max:8|confirmed',

            ],
        );
    }
    


}
