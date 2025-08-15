<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * admin dashboard
     */
    public function index()
    {
        return view('backend.pages.dashboard.index');
    }

    /**
     * admin login view
     */
    public function adminlogin()
    {
        return view('auth.admin-login');
    }
}