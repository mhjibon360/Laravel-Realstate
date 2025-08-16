<?php

namespace App\Http\Controllers\Backend;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alllocation = Location::orderBy('id', 'asc')->get();
        return view('backend.pages.location.index', compact('alllocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return($request->all());
        // validate
        $request->validate([
            'location_image' => 'required',
            'location_name' => 'required|string|unique:locations,location_name',
        ]);

        //upload image
        if ($request->hasFile('location_image')) {
            $location_image = $request->file('location_image');
            $name = hexdec(uniqid()) . '.' . $location_image->getClientOriginalExtension();
            $url = "upload/location/" . $name;
            $location_image->move(public_path("upload/location/"), $name);
        }

        //store data
        Location::create([
            'location_image' =>  $url,
            'location_name' => $request->location_name,
            'location_slug' => Str::slug($request->location_name),
            'created_at' => now(),
        ]);

        // notification
        notyf()->success('Data store success');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::findOrFail($id);
        return view('backend.pages.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::findOrFail($id);

        // validate
        $request->validate([
            'location_image' => 'nullable',
            'location_name' => 'required|string|unique:locations,location_name,' . $id,
        ]);

        //upload image
        if ($request->hasFile('location_image')) {
            $location_image = $request->file('location_image');
            $name = hexdec(uniqid()) . '.' . $location_image->getClientOriginalExtension();
            $url = "upload/location/" . $name;
            $location_image->move(public_path("upload/location/"), $name);
            // unlink
            if (file_exists($location->location_image)) {
                @unlink($location->location_image);
            }
        }

        //store data
        $location->update([
            'location_image' =>  isset($url) ? $url : $location->location_image,
            'location_name' => $request->location_name,
            'location_slug' => Str::slug($request->location_name),
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return redirect()->route('admin.location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        // unlink
        if (file_exists($location->location_image)) {
            @unlink($location->location_image);
        }
        // delete
        $location->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
