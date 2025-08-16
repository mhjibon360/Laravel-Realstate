<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     * edit profile
     */
    public function editprofile()
    {
        return view('backend.pages.profile.admin-profile');
    }

    /**
     * update profile
     */
    public function updateprofile(Request $request) {}

    /**
     * admin logout
     */
    public function adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        notyf()->warning('Logout success');
        return redirect()->route('admin.logint');
    }


    /**
     * admin login view
     */
    public function adminlogin()
    {
        return view('auth.admin-login');
    }
}
