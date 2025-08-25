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
use App\Models\Propertytype;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;


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
        $chooseusall = ChooseUs::all();
        $allplaces = Location::orderBy('id', 'asc')->limit(4)->get();
        $allnews = BlogPost::with(['blogcategory', 'blogtags', 'users'])->where('status', 1)->latest()->limit(3)->get();
        $alllocation = Location::all();
        $allpropertytype = Propertytype::all();
        // return ($allnews);
        return view(
            'frontend.pages.index',
            compact([
                'banner',
                'propertycatgorys',
                'video',
                'chooseusall',
                'allplaces',
                'allnews',
                'alllocation',
                'allpropertytype'
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
        $categorywiseproperty = Property::with(['propertycategory', 'users'])->where('status', 1)->where('category_id', $categoryproperty->id)->latest()->paginate(5);
        return view('frontend.pages.category-wise-propert', compact(['categoryproperty', 'categorywiseproperty']));
    }

    /**
     * location wise propety
     */
    public function locationwiseproperty($location_slug)
    {
        $location = Location::where('location_slug', $location_slug)->first();
        $locationwiseproperty = Property::with(['propertycategory', 'users'])->where('status', 1)->where('location_id', $location->id)->latest()->paginate(5);
        return view('frontend.pages.location-wise-propert', compact(['location', 'locationwiseproperty']));
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

    /**
     * search rent
     */
    public function searchrent(Request $request)
    {
        $properties = QueryBuilder::for(Property::class)
            ->allowedFilters([
                AllowedFilter::exact('buy_rent_type'),
                AllowedFilter::partial('property_name'),

                // belongsTo relation দিয়ে filter
                AllowedFilter::belongsTo('location_id', 'location'),
                AllowedFilter::belongsTo('property_id', 'propertyType'),
            ])
            ->get();

        return ($properties);
    }

    /**
     * search buy for
     */
    public function searchbuy(Request $request)
    {
        return view('frontend.pages.buy-property', compact('searchbuyproperties'));
    }
    /**
     * property list
     */
    public function propertylist()
    {
        $allproperty = QueryBuilder::for(Property::class)
            ->with(['propertycategory', 'users'])
            ->allowedFilters([
                AllowedFilter::partial('property_name'), // text search
                AllowedFilter::exact('location_id'),     // exact match
                AllowedFilter::exact('propertytype_id'), // exact match
                AllowedFilter::exact('buy_rent_type'),   // exact match
            ])
            ->latest()
            ->paginate(20);

        return view('frontend.pages.property-list', compact('allproperty'));
    }

    /**
     * category news
     */
    public function searchnews(Request $request)
    {
        $searchkeyword = $request->filter;
        $searchnews = QueryBuilder::for(BlogPost::class)
            ->allowedFilters(['title'])
            ->paginate(20);
        return view('frontend.pages.dearch-blog', compact(['searchkeyword', 'searchnews']));
    }

    /**
     * category news
     */
    public function categorynews($category_slug)
    {
        $category = BlogCategory::where('category_slug', $category_slug)->first();
        $categorynews = BlogPost::where('category_id', $category->id)->latest()->paginate(20);
        return view('frontend.pages.category-blog', compact(['category', 'categorynews']));
    }

    /**
     * tag news
     */
    public function tagnews($tag_slug)
    {
        $tag = BlogTag::where('tag_slug', $tag_slug)->first();
        $tagnews = $tag->blogposts()->latest()->paginate(20);
        return view('frontend.pages.tag-blog', compact(['tag', 'tagnews']));
    }

    /**
     * all news
     */
    public function allnews()
    {
        $allblognews = BlogPost::latest()->paginate(20);
        return view('frontend.pages.all-blog', compact('allblognews'));
    }

    /**
     * about us
     */
    public function about()
    {
        $banner = Banner::first();
        return view('frontend.pages.about',compact('banner'));
    }

    /**
     * contact us
     */
    public function contact()
    {
        $banner = Banner::first();
        return view('frontend.pages.contact',compact('banner'));
    }
}
