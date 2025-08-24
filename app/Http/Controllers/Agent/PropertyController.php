<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Nearby;
use App\Models\Location;
use App\Models\Property;
use App\Models\Multiimage;
use Illuminate\Support\Str;
use App\Models\Propertytype;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allproperty = Property::where('user_id', Auth::id())->latest()->get();
        return view('agent.pages.property.index', compact('allproperty'));
    }

    /**
     * Display a listing of the active property
     */
    public function activeproperty()
    {
        $allproperty = Property::where('user_id', Auth::id())->where('status', 1)->latest()->get();
        return view('agent.pages.property.active-property', compact('allproperty'));
    }
    /**
     * Display a listing of the deactive property
     */
    public function deactiveproperty()
    {
        $allproperty = Property::where('user_id', Auth::id())->where('status', 0)->get();
        return view('agent.pages.property.deactive-property', compact('allproperty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allpcategory = PropertyCategory::all();
        $alllocation = Location::all();
        $allpropertytype = Propertytype::all();

        return view('agent.pages.property.create', compact(['allpcategory', 'alllocation', 'allpropertytype']));
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


        if ($pid) {
            User::where('id', Auth::id())->update([
                'credit' => DB::raw('credit-1'),
            ]);
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
        $allpcategory = PropertyCategory::all();
        $alllocation = Location::all();
        $allpropertytype = Propertytype::all();
        $property = Property::findOrFail($id);
        return view('agent.pages.property.edit', compact(['allpcategory', 'alllocation', 'allpropertytype', 'property']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $property = Property::findOrFail($id);

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
            //unlink
            if (file_exists($property->thumbnail)) {
                @unlink($property->thumbnail);
            }
        }

        //upload static graph image
        if ($request->hasFile('page_statistics_image')) {
            $page_statistics_image = $request->file('page_statistics_image');
            $staticname = hexdec(uniqid()) . '.' . $page_statistics_image->getClientOriginalExtension();
            $staticurl = "upload/property/static/" . $staticname;
            $page_statistics_image->move(public_path("upload/property/static/"), $staticname);
            //unlink
            if (file_exists($property->page_statistics_image)) {
                @unlink($property->page_statistics_image);
            }
        }

        $property->update([
            'thumbnail' => isset($thumurl) ? $thumurl : $property->thumbnail,
            'page_statistics_image' => isset($staticurl) ? $staticurl : $property->page_statistics_image,
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
            'updated_at' => now(),
        ]);

        // notification
        notyf()->success('Property update success');
        return redirect()->route('admin.property.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // gallery
        $gallerys = Multiimage::where('product_id', $property->id)->get();
        foreach ($gallerys as $gallery) {
            if (file_exists($gallery->image_name)) {
                @unlink($gallery->image_name);
            }
            // delete multi image gallery row
            $gallery->delete();
        }

        // nearyby facility delete
        $facilities = Nearby::where('property_id', $property->id)->get();
        foreach ($facilities as $faci) {
            // delete nearby all belongs this property
            $faci->delete();
        }

        // delete property row
        $property->delete();

        // notification
        notyf()->warning('Property delete success');
        return redirect()->route('admin.property.index');
    }

    /**
     * hot property status change
     */
    public function hotproperty(Request $request)
    {
        $property = Property::findOrFail($request->id);

        if ($property->hot_property == 1) {
            $property->update([
                'hot_property' => 0,
            ]);
            return response()->json([
                'success' => 'Hot property Deactive success',
            ]);
        } else {
            $property->update([
                'hot_property' => 1,
            ]);
            return response()->json([
                'success' => 'Hot property Active success',
            ]);
        }
    }

    /**
     * featured property status change
     */
    public function featuredproperty(Request $request)
    {
        $property = Property::findOrFail($request->id);

        if ($property->featured_property == 1) {
            $property->update([
                'featured_property' => 0,
            ]);
            return response()->json([
                'success' => 'Featured property Deactive success',
            ]);
        } else {
            $property->update([
                'featured_property' => 1,
            ]);
            return response()->json([
                'success' => 'Featured property Active success',
            ]);
        }
    }

    /**
     *  property status change
     */
    public function propertystatus(Request $request)
    {
        $property = Property::findOrFail($request->id);

        if ($property->status == 1) {
            $property->update([
                'status' => 0,
            ]);
            return response()->json([
                'success' => ' property Status Deactive success',
            ]);
        } else {
            $property->update([
                'status' => 1,
            ]);
            return response()->json([
                'success' => ' property Status Active success',
            ]);
        }
    }
}
