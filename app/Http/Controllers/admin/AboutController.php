<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AboutController extends Controller
{
    use UploadImageTrait;

    public function edit($id)
    {
        $about =  About::find($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {

        $about = About::where('id', $id)->first();

        $request->validate([
            'descrption' => 'required|min:3|max:1080',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            File::delete(public_path('images/about/' . $about->image));
            $newFilename = $this->saveImages($request->file('image'), 'images/about');
        }

        $about->update([
            'descrption' => $request->descrption,
            'image' => $newFilename ?? $about->image,
        ]);

        return redirect()->route('about.edit', $about->id)
            ->with('success', 'About updated successfully.');
    }
}
