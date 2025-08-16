<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function updateprofile(Request $request)
    {
        $data = User::where('id', $request->id)->first();

        // validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);

        // profile photo update and unlink
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoname = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $phtourl = "upload/profile/admin/" . $photoname;
            $photo->move(public_path("upload/profile/admin/"), $photoname);
            // unlink
            if (file_exists($data->photo)) {
                @unlink($data->photo);
            }
        }

        // profile cover update and unlink
        if ($request->hasFile('cover_photo')) {
            $coverphoto = $request->file('cover_photo');
            $coverphotoname = hexdec(uniqid()) . '.' . $coverphoto->getClientOriginalExtension();
            $coverphotourl = "upload/profile/admin/" . $coverphotoname;
            $coverphoto->move(public_path("upload/profile/admin/"), $coverphotoname);
            // unlink
            if (file_exists($data->cover_photo)) {
                @unlink($data->cover_photo);
            }
        }

        // update data
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'photo' => isset($phtourl) ? $phtourl : $data->photo,
            'cover_photo' => isset($coverphotourl) ? $coverphotourl : $data->cover_photo,
            'address' => $request->address,
            'details' => $request->details,
            'profession' => $request->profession,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'google' => $request->google,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('profile update success');
        return back();
    }

    /**
     * change password
     */
    public function changepassword()
    {
        return view('backend.pages.profile.admin-change-password');
    }

    /**
     * update password
     */
    public function updatepassword(Request $request)
    {
        //    validate
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            User::where('id', $request->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            // notification
            notyf()->info('Password change success');
            return back();
        } else {
            // notification
            notyf()->error('current password doesn\'t match our record');
            return back();
        }
    }


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

    /**
     * admin froget password view
     */
    public function forgotpassword()
    {
        return view('auth.admin-forget-password');
    }

    /**
     * admin reset password view
     */
    public function resetpassword()
    {
        return view('auth.admin-reset-password');
    }
}
