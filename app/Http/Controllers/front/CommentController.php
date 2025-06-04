<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function add_comment(Request $request)
    {

        $request->validate([
            'comment' => 'required|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'user_id' => auth('web')->id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', 'Your comment has been added successfully!');
    }


}
