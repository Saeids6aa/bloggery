<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with(['admin', 'category', 'tags'])->paginate(5);
        return PostResource::collection($posts);
    }


    public function show($id)
    {
        $post = Post::with(['admin', 'category', 'tags'])->find($id);

        if (! $post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return new PostResource($post);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (! $post) {
            return response()->json([
                'status'  => false,
                'message' => 'Post not found',
            ], 404);
        }
        if ($post->image) {
            $imagePath = public_path('images/posts/image/' . $post->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $post->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Post deleted successfully',
        ], 200);
    }
}
