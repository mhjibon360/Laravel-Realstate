<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * banner view
     */
    public function managebanner()
    {
        $banner = Banner::first();
        return view('backend.pages.banner.index', compact('banner'));
    }

    /**
     * update banner
     */
    public function updatebanner(Request $request)
    {

        $banner = Banner::findOrFail($request->id);

        // validate
        $request->validate([
            'image' => 'nullable',
            'heading' => 'required',
            'title' => 'required',
        ]);

        // banner update and unlink
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $phtourl = "upload/banner/" . $name;
            $image->move(public_path("upload/banner/"), $name);
            // unlink
            if (file_exists($banner->image)) {
                @unlink($banner->image);
            }
        }

        //update
        $banner->update([
            'image' => isset($phtourl) ? $phtourl : $banner->image,
            'heading' => $request->heading,
            'title' => $request->title,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Banner update success');
        return back();
    }
}
