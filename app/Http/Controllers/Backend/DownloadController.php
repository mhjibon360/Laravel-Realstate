<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * download view
     */
    public function managedownload()
    {
        $download = Download::first();
        return view('backend.pages.download.index', compact('download'));
    }

    /**
     * update banner
     */
    public function updatedownload(Request $request)
    {

        $download = Download::findOrFail($request->id);

        // validate
        $request->validate([
            'frame_image' => 'nullable',
            'download_heading' => 'required',
            'download_title' => 'required',
        ]);

        // banner update and unlink
        if ($request->hasFile('frame_image')) {
            $image = $request->file('frame_image');
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $phtourl = "upload/download/" . $name;
            $image->move(public_path("upload/download/"), $name);
            // unlink
            if (file_exists($download->frame_image)) {
                @unlink($download->frame_image);
            }
        }

        //update
        $download->update([
            'frame_image' => isset($phtourl) ? $phtourl : $download->frame_image,
            'download_heading' => $request->download_heading,
            'download_title' => $request->download_title,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Download update success');
        return back();
    }
}
