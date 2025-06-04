<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\tags;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $posts =  Post::with(['admin', 'category', 'tags'])->paginate(5);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $tags = tags::select('id', 'name')->get();
        return view('posts.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,except,id',
            'description' => 'required|min:3|max:1080',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,PNG,jpg,gif|max:10240',
            'tags'        => 'required|array',
            'tags.*'      => 'integer|exists:tags,id',
        ]);
        $file_name = $this->saveImages($request->image, 'images/posts/image');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'admin_id' => auth('admin')->user()->id,
            'image' => $file_name
        ]);

        if (!$post) {
            return redirect()->route('posts')->with('error', 'Somthing Went Wrong !');
        }
        $post->tags()->sync($request->tags);
        Cache::forget('recent_posts');

        return redirect()->route('posts')->with('success', 'Posts added successfully!');
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::select('id', 'name')->get();
        $tags = tags::select('id', 'name')->get();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $request->validate([
            'title'       => "required|unique:posts,title," . $id,
            'description' => 'required|min:3|max:1080',
            'category_id' => 'required|integer|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tags'        => 'required|array',
            'tags.*'      => 'integer|exists:tags,id',
        ]);

        if ($request->hasFile('image')) {
            File::delete(public_path('images/posts/image/' . $post->image));
            $newFilename = $this->saveImages($request->file('image'), 'images/posts/image');
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $newFilename ?? $post->image,
        ]);

        $post->tags()->sync($request->tags);
        Cache::forget('recent_posts');

        return redirect()->route('posts')
            ->with('success', 'Post updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        File::delete(public_path('images/posts/image/' . $post->image));
        $post->tags()->detach();

        $post->delete();
        Cache::forget('recent_posts');

        return redirect()->route('posts')->with('success', 'Posts deleted successfully!');
    }


    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::select('id', 'name')->get();
        $tags = tags::select('id', 'name')->get();

        return view('posts.show', compact('post', 'categories', 'tags'));
    }


    public function show_post_comment($id)
    {
        $post = Post::with(['user', 'comments'])->find($id);

        return view('posts.show_post_comments', compact('post'));
    }

    public function delete_comment($id)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
