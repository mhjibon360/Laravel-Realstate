<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Video;
use App\Models\Banner;
use App\Models\Nearby;
use App\Models\BlogPost;
use App\Models\ChooseUs;
use App\Models\Download;
use App\Models\Location;
use App\Models\Platform;
use App\Models\Property;
use App\Models\Testimonial;
use App\Models\AgentMessage;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{

    /**
     * frontend home index
     */
    public function index()
    {
        $banner = Banner::first();
        $propertycatgorys = PropertyCategory::latest()->limit(5)->get();
        $video = Video::first();
        $alltestimonials = Testimonial::where('status', 1)->latest()->get();
        $chooseusall = ChooseUs::all();
        $allplaces = Location::orderBy('id', 'asc')->limit(4)->get();
        $allagents = User::where('status', 1)->where('role', 'agent')->latest()->get();
        $download = Download::first();
        $allplatform = Platform::all();
        $allnews = BlogPost::with(['blogcategory', 'blogtags', 'users'])->where('status', 1)->latest()->limit(3)->get();
        // return ($allnews);
        return view(
            'frontend.pages.index',
            compact([
                'banner',
                'propertycatgorys',
                'video',
                'alltestimonials',
                'chooseusall',
                'allplaces',
                'allagents',
                'download',
                'allplatform',
                'allnews'
            ])
        );
    }

    /**
     * news details
     */
    public function newsdetails($slug)
    {
        $news = BlogPost::with(['blogcategory', 'blogtags', 'users'])->where('slug', $slug)->first();
        $blogcategory = BlogCategory::latest()->limit(20)->get();
        $recentnews = BlogPost::where('status', 1)->latest()->take(5)->get();
        // return ($news);
        return view('frontend.pages.blog-details', compact(['news', 'blogcategory', 'recentnews']));
    }

    /**
     * property details
     */
    public function propertydetails($property_slug)
    {
        $property = Property::with(['propertycategory', 'users'])->where('property_slug', $property_slug)->where('status', 1)->first();

        $allnearbygroup = Nearby::where('property_id', $property->id)->select('nearby_group_name')->groupBy('nearby_group_name')->get();

        $allnearby = Nearby::where('property_id', $property->id)->get();

        $relatedpoperty = Property::where('category_id', $property->category_id)->where('id', '!=', $property->id)->take(3)->get();

        // return ($allnearbygroup);
        return view('frontend.pages.property-details', compact(['property', 'allnearbygroup', 'allnearby', 'relatedpoperty']));
    }

    /**
     * property category
     */
    public function propertycategory()
    {
        $allpropertycatgorys = PropertyCategory::latest()->get();
        $recentproperty = Property::with(['propertycategory', 'users'])->where('status', 1)->limit(3)->get();
        return view('frontend.pages.property-category', compact('allpropertycatgorys', 'recentproperty'));
    }

    /**
     * category wise propety
     */
    public function categorywiseproperty($category_slug)
    {
        $categoryproperty = propertycategory::where('category_slug', $category_slug)->first();
        $categorywiseproperty = Property::where('status', 1)->where('category_id', $categoryproperty->id)->latest()->paginate(5);
        return view('frontend.pages.category-wise-propert', compact(['categoryproperty', 'categorywiseproperty']));
    }

    /**
     * out agent
     */
    public function ouragent()
    {
        $allagents = User::where('status', 1)->where('role', 'agent')->latest()->paginate(5);
        $mayyoulikes = Property::with(['propertycategory', 'users'])->where('status', 1)->limit(3)->inRandomOrder()->get();
        return view('frontend.pages.our-agent', compact(['allagents', 'mayyoulikes']));
    }

    /**
     * agent details
     */
    public function agendetails($id, $username)
    {
        $agent = User::where('username', $username)->first();
        $agentproperty = Property::with(['propertycategory', 'users'])->where('status', 1)->where('user_id', $agent->id)->latest()->paginate(20);
        $mayyoulikes = Property::with(['propertycategory', 'users'])->where('status', 1)->limit(3)->where('user_id', $agent->id)->inRandomOrder()->get();
        $forpropertycount = Property::with(['propertycategory', 'users'])->where('status', 1)->where('user_id', $agent->id)->where('buy_rent_type', 'rent')->count();
        $buypropertycount = Property::with(['propertycategory', 'users'])->where('status', 1)->where('user_id', $agent->id)->where('buy_rent_type', 'buy')->count();

        return view('frontend.pages.agnet-profile', compact(['agent', 'agentproperty', 'mayyoulikes', 'forpropertycount', 'buypropertycount']));
    }

    /**
     * contact agent message
     */
    public function contactagentmessage(Request $request)
    {

        if (Auth::check()) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ]);

            AgentMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);
            // notification
            notyf()->success('Thanks for your contact message');
            return back();
        } else {
            return redirect()->route('login');
        }
    }
}
