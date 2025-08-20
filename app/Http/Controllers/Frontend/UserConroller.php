<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserConroller extends Controller
{
    /**
     * customer dashboard
     */
    public function index()
    {
        return view('frontend.pages.dashboard.index');
    }
}
