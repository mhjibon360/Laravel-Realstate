<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Multiimage;
use Illuminate\Http\Request;

class MultiimageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image_name')) {
            foreach ($request->file('image_name') as $key => $photo) {
                $galleryname = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                $url = "upload/property/multiimage/" . $galleryname;
                $photo->move(public_path("upload/property/multiimage/"), $galleryname);
                Multiimage::insert([
                    'product_id' => $request->pid,
                    'image_name' => $url,
                ]);
            }
        }
        // notification
        notyf()->success('Gallery Image added success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Multiimage::where('id', $id)->first();

        //validate
        $request->validate([
            'galleryphoto' => 'required',
        ]);


        if ($request->hasFile('galleryphoto')) {
            $galleryphoto = $request->file('galleryphoto');
            $galleryname = hexdec(uniqid()) . '.' . $galleryphoto->getClientOriginalExtension();
            $url = "upload/property/multiimage/" . $galleryname;
            $galleryphoto->move(public_path("upload/property/multiimage/"), $galleryname);
            // unlink
            if (file_exists($gallery->image_name)) {
                @unlink($gallery->image_name);
            }
        }

        // update
        $gallery->update([
            'image_name' => isset($url) ? $url : $gallery->image_name,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Image change success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Multiimage::findOrFail($id);
        if (file_exists($gallery->image_name)) {
            @unlink($gallery->image_name);
        }
        $gallery->delete();
        // notification
        notyf()->warning('Image delete success');
        return back();
    }
}
