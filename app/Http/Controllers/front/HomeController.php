<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\tags;
use Illuminate\Http\Request;
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

    public function index()
    {
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

        return view('front.index')->with([
            'categories' => $categories,
            'tags'       => $tags,
            'posts'      => $posts,
        ]);
    }

    public function show_post($id)
    {
        $data = $this->get_category_tags_data();
        $categories = $data['categories'];
        $tags = $data['tags'];


        $post = Post::find($id);
        return view('front.show_post')->with([
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }



    public function all_posts()
    {
        $data = $this->get_category_tags_data();
        $categories = $data['categories'];
        $tags = $data['tags'];

        $posts = Post::with(['admin', 'category', 'tags'])->paginate(6);
        return view('front.all_posts')->with([
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
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
