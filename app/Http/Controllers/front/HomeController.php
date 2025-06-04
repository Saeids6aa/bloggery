<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\contact;
use App\Models\Post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $categories = DB::table('categories')
    //         ->select('id', 'name')
    //         ->get();

    //     $tags = DB::table('tags')
    //         ->select('id', 'name')
    //         ->get();

    //     $posts = DB::table('posts')
    //         ->join('admins', 'posts.admin_id', '=', 'admins.id')
    //         ->join('categories', 'posts.category_id', '=', 'categories.id')
    //         // ->leftJoin('post_tags', 'posts.id', '=', 'post_tags.post_id')
    //         // ->leftJoin('tags', 'post_tags.tag_id', '=', 'tags.id')
    //         ->select(
    //             'posts.id',
    //             'posts.title',
    //             'posts.image',
    //             'posts.description',
    //             'admins.admin_name as admin_name',
    //             'categories.name as category_name',
    //             // DB::raw("GROUP_CONCAT(tags.name SEPARATOR ', ') as tag_list"),
    //             DB::raw("DATE_FORMAT(posts.created_at, '%M %d, %Y') as Date")
    //         )->groupBy(
    //             'posts.id',
    //             'posts.title',
    //             'posts.image',
    //             'posts.description',
    //             'admins.admin_name',
    //             'categories.name',
    //             'posts.created_at'
    //         )->get();



    //     return view('front.index')->with([
    //         'categories' => $categories,
    //         'tags'       => $tags,
    //         'posts'      => $posts,
    //     ]);
    // }

    public function index(Request $request)
    {
        $q = $request->input('q');

        $data = $this->get_category_tags_data();
        $categories = $data['categories'];
        $tags = $data['tags'];


        if ($q) {
            $posts = Post::where('title', 'like', "%{$q}%")
                ->orderBy('created_at', 'desc')->get();
        } else {
            $data = $this->get_category_tags_data();
            $categories = $data['categories'];
            $tags = $data['tags'];

            $posts = Post::with('tags')
                ->join('admins', 'posts.admin_id', '=', 'admins.id')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select(
                    'posts.id',
                    'posts.title',
                    'posts.image',
                    'posts.description',
                    'admins.admin_name as admin_name',
                    'categories.name as category_name',
                    DB::raw("DATE_FORMAT(posts.created_at, '%M %d, %Y') as Date")
                )
                ->get()->shuffle();
        }

        return view('front.index')->with([
            'categories' => $categories,
            'tags'       => $tags,
            'posts'      => $posts,
            'q' => $q,
        ]);
    }

    public function show_post($id)
    {
        $data = $this->get_category_tags_data();
        $categories = $data['categories'];
        $tags = $data['tags'];

        $post = Post::findOrFail($id);

        $comments = $post->comments()->with('user')->latest()->paginate(5);
        return view('front.show_post')->with([
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'comments' => $comments
        ]);
    }



    public function all_posts()
    {
        $data = $this->get_category_tags_data();
        $categories = $data['categories'];
        $tags = $data['tags'];

        $posts = Post::with(['admin', 'category', 'tags'])->paginate(4);
        return view('front.all_posts')->with([
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    function about_us()
    {
        $about = About::first();
        return view('front.about', compact('about'));
    }

    function contact()
    {
        return view('front.contact');
    }

    public function send_contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:3|max:255',
        ]);

        $contact = contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your Message has been send Sir :) ');
    }

    public function categories_posts($id)
    {
        $posts = Post::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $categoryName = Category::find($id)->name;

        return view('front.posts_categories', compact('posts', 'categoryName'));
    }

    public function tags_posts($id)
    {
        $posts = DB::table('posts')
            ->join('post_tags', 'posts.id', '=', 'post_tags.post_id')
            ->where('post_tags.tag_id', $id)
            ->join('admins', 'posts.admin_id', '=', 'admins.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select([
                'posts.id',
                'posts.title',
                'posts.image',
                'posts.description',
                'admins.admin_name as admin_name',
                'categories.name  as category_name',
                DB::raw("DATE_FORMAT(posts.created_at, '%M %d, %Y') as Date")
            ])->orderBy('posts.created_at', 'desc')
            ->paginate(6);

        $tagName = DB::table('tags')->where('id', $id)->value('name');


        return view('front.tags_posts', compact('posts', 'tagName'));
    }


    protected function get_category_tags_data()
    {
        $categories = DB::table('categories')->select('id', 'name')->get();
        $tags       = DB::table('tags')->select('id', 'name')->get();

        return  [
            'categories' => $categories,
            'tags'       => $tags,
        ];
    }
}
