<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::select(
            'id',
            'name',
            'created_at'
        )->paginate(5);
        return view('categories.index', compact('categories'));
    }

    function create()
    {
        return view('categories.create');
    }


    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',


        ]);
        // validation 

        //store to database

        Category::create([

            'name'  => $request->name,

        ]);
        return redirect()->route('categories')->with('success', 'categories added successfully!');
    }


    public function delete($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            return redirect()->route('categories')->with('error', 'categorie Not Found!');
        }

        $categories->delete();
        return redirect()->route('categories')->with('success', 'categorie deleted successfully!');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            return redirect()->route('categories')->with('error', 'categories Not Found!');
        }
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,

        ]);
        $categories = Category::find($id);

        $categories->name = $request->name;

        $categories->save();
        return redirect()->route('categories')->with('success', 'categories " ' . $categories->name . ' " updated successfully!');
    }
}
