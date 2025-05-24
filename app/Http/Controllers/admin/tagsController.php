<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tags;
use Illuminate\Http\Request;

class tagsController extends Controller
{

    
    public function index()
    {
        $tags = tags::select(
            'id',
            'name',
            'created_at'
        )->paginate(5);
        return view('tags.index', compact('tags'));
    }

    function create()
    {
        return view('tags.create');
    }
     function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
  
        tags::create([

            'name'  => $request->name,

        ]);
        return redirect()->route('tags')->with('success', 'tags added successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,

        ]);
        $tags = tags::find($id);

        $tags->name = $request->name;

        $tags->save();
        return redirect()->route('tags')->with('success', 'tags " ' . $tags->name . ' " updated successfully!');
    }





public function edit($id){
     $tags = tags::find($id);
        if (!$tags) {
            return redirect()->route('tags')->with('error', 'tags Not Found!');
        }
        return view('tags.edit', compact('tags'));

}
   public function delete($id)
    {
        $tags = tags::find($id);
        if (!$tags) {
            return redirect()->route('tags')->with('error', 'categorie Not Found!');
        }

        $tags->delete();
        return redirect()->route('tags')->with('success', 'categorie deleted successfully!');
    }


}
