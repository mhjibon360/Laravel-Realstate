<?php

namespace App\Http\Controllers\Agent;

use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Models\PackageHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    /**
     * all plan
     */
    public function allplan()
    {
        $allplan = Pricing::all();
        return view('agent.pages.package.index', compact('allplan'));
    }

    /**
     * purchase histoyr
     */
    public function purchasehistory()
    {
        $purchaehistory=PackageHistory::with('package')->where('agent_id',Auth::id())->get();
        // return($purchaehistory);
        return view('agent.pages.package.purchase-history',compact('purchaehistory'));
    }
}
