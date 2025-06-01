<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SettingController extends Controller
{
    use UploadImageTrait;

    public function edit($id)
    {
        $setting =  Setting::find($id);
        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {

        $setting = Setting::where('id', $id)->first();

        $request->validate([
            'url_twitter'   => 'required|url',
            'url_facebook'  => 'required|url',
            'url_whatsapp'  => 'required|url',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
            'icon'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            File::delete(public_path('images/setting/' . $setting->icon));
            $newFilename = $this->saveImages($request->file('icon'), 'images/setting');
        }

        $setting->update([
            'url_twitter'   => $request->url_twitter,
            'url_facebook'  => $request->url_facebook,
            'url_whatsapp'  => $request->url_whatsapp,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'icon'          => $newFilename ?? $setting->icon,
        ]);

        return redirect()->route('setting.edit', $setting->id)
            ->with('success', 'Setting updated successfully.');
    }
}
