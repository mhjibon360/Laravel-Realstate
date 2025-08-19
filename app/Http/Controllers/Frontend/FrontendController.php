<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Video;
use App\Models\Banner;
use App\Models\ChooseUs;
use App\Models\Location;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Platform;

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
        // return($allplatform);
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
                'allplatform'
            ])
        );
    }
}
