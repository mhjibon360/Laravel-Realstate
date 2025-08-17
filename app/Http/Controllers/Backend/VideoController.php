<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * video view
     */
    public function managevideo()
    {
        $video = Video::first();
        return view('backend.pages.video.index', compact('video'));
    }

    /**
     * update banner
     */
    public function updatevideo(Request $request)
    {

        $video = Video::findOrFail($request->id);

        // validate
        $request->validate([
            'image' => 'nullable',
            'link' => 'required',
        ]);

        // video update and unlink
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $phtourl = "upload/video/" . $name;
            $image->move(public_path("upload/video/"), $name);
            // unlink
            if (file_exists($video->image)) {
                @unlink($video->image);
            }
        }

        //update
        $video->update([
            'image' => isset($phtourl) ? $phtourl : $video->image,
            'link' => $request->link,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Video update success');
        return back();
    }
}
