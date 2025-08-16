<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AgentController extends Controller
{
    /**
     * admin dashboard
     */
    public function index()
    {
        return view('agent.pages.dashboard.index');
    }

    /**
     * edit profile
     */
    public function editprofile()
    {
        return view('agent.pages.profile.agent-profile');
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
            $phtourl = "upload/profile/agent/" . $photoname;
            $photo->move(public_path("upload/profile/agent/"), $photoname);
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
        return view('agent.pages.profile.agent-change-password');
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
    public function agentlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        notyf()->warning('Logout success');
        return redirect()->route('agent.login');
    }


    /**
     * agent login view
     */
    public function agentregister()
    {
        return view('auth.agent-register');
    }

    /**
     * agent register store
     */
    public function agentregisterstore(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'agent',
        ]);

        event(new Registered($user));

        Auth::login($user);
        // notification
        notyf()->success('Account Create success');
        return redirect(route('agent.dashboard', absolute: false));
    }

    /**
     * agent login view
     */
    public function agentlogin()
    {
        return view('auth.agent-login');
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
