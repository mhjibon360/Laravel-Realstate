<?php

namespace App\Http\Controllers\Backend;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Str;
use App\Models\Propertytype;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use App\Models\Multiimage;
use App\Models\Nearby;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
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
        $allpcategory = PropertyCategory::all();
        $alllocation = Location::all();
        $allpropertytype = Propertytype::all();
        return view('backend.pages.property.create', compact(['allpcategory', 'alllocation', 'allpropertytype']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // validate data
        $request->validate([
            'property_name' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'propertytype_id' => 'required',
            'buy_rent_type' => 'required',
            'price' => 'required',
            'property_descriptions' => 'required',
            'property_id' => 'required',
            'rooms' => 'required',
            'bedroom' => 'required',
            'year_build' => 'required',
            'bath_rooms' => 'required',
            'property_size' => 'required',
            'garaze_count' => 'required',
            // 'thumbnail' => 'required',
        ]);


        //upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $namethumbnail = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumurl = "upload/property/" . $namethumbnail;
            $thumbnail->move(public_path("upload/property/"), $namethumbnail);
        }

        //upload static graph image
        if ($request->hasFile('page_statistics_image')) {
            $page_statistics_image = $request->file('page_statistics_image');
            $namepage_statistics_image = hexdec(uniqid()) . '.' . $page_statistics_image->getClientOriginalExtension();
            $staticurl = "upload/property/static/" . $namepage_statistics_image;
            $page_statistics_image->move(public_path("upload/property/static/"), $namepage_statistics_image);
        }



        $pid =  Property::insertGetId([
            'thumbnail' => $thumurl,
            'page_statistics_image' => $staticurl,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'propertytype_id' => $request->propertytype_id,
            'property_name' => $request->property_name,
            'property_slug' => Str::slug($request->property_name),
            'buy_rent_type' => $request->buy_rent_type,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'property_descriptions' => $request->property_descriptions,
            'property_id' => $request->property_id,
            'rooms' => $request->rooms,
            'garage_size' => $request->garage_size,
            'bedroom' => $request->bedroom,
            'year_build' => $request->year_build,
            'bath_rooms' => $request->bath_rooms,
            'property_size' => $request->property_size,
            'garaze_count' => $request->garaze_count,
            'amenities' => $request->amenities,
            'address' => $request->address,
            'country' => $request->country,
            'state_country' => $request->state_country,
            'neighborhood' => $request->neighborhood,
            'zip_postal_code' => $request->zip_postal_code,
            'city' => $request->city,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'hot_property' => $request->hot_property,
            'featured_property' => $request->featured_property,
            'status' => $request->status ? $request->status : '1',
            'created_at' => now(),
        ]);



        // store nearby data
        if ($request->nearby_group_name) {
            foreach ($request->nearby_group_name as $key => $groupname) {
                Nearby::insert([
                    'property_id' => $pid,
                    'nearby_group_name' => $groupname,
                    'nearby_group_title' => $request->nearby_group_title[$key] ?? null,
                    'created_at' => now(),
                ]);
            }
        }

        // store multi image
        if ($request->hasFile('image_name')) {
            foreach ($request->image_name as $multiimage) {
                $multiimagename = hexdec(uniqid()) . '.' . $multiimage->getClientOriginalExtension();
                $multiurl = "upload/property/multiimage/" . $multiimagename;
                $multiimage->move(public_path("upload/property/multiimage/"), $multiimagename);
                Multiimage::insert([
                    'product_id' => $pid,
                    'image_name' => $multiurl,
                    'created_at' => now(),
                ]);
            }
        }

        // notification
        notyf()->success('Property added success');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
