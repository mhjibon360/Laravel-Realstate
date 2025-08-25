<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\AgentMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserConroller extends Controller
{
    /**
     * customer dashboard
     */
    public function index()
    {
        return view('frontend.pages.dashboard.index');
    }

    /**
     * edit profile
     */
    public function editprofile()
    {
        return view('frontend.pages.dashboard.profile');
    }

    /**
     * update profile
     */
    public function updateprofile(Request $request)
    {
        // find auth user
        $data = User::where('id', $request->id)->first();

        // validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required',
            'photo' => 'nullable',
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

        // update data
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'photo' => isset($phtourl) ? $phtourl : $data->photo,
            'address' => $request->address,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('profile update success');
        return back();
    }

    /**change password */
    public function changepassword()
    {
        return view('frontend.pages.dashboard.change-password');
    }

    /** update password */

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
            notyf()->success('Thanks for your contact');
            return back();
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * send contact message
     */
    public function sendmessage(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            ContactMessage::insert([
                'user_id' => Auth::check(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'name' => $request->name,
                'created_at' => now(),
            ]);
            // notification
            notyf()->success('Thanks for your contact message');
            return back();
        } else {
            notyf()->error('Please sing to send message');
            return back();
        }
    }
}
