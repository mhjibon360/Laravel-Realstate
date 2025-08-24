<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

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
}
