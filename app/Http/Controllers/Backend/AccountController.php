<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * all account list
     */
    public function allagentaccount()
    {
        $allagents = User::where('role', 'agent')->latest()->get();
        return view('backend.pages.accounts.agents.all-agent', compact('allagents'));
    }



    /**
     * admin edit agent account
     */
    public function editagentaccount($id)
    {
        $agent = User::where('id', $id)->first();
        return view('backend.pages.accounts.agents.edit-agent', compact('agent'));
    }

    /**
     * update agent account
     */
    public function updateagentaccount(Request $request, $id)
    {
        $data = User::where('id', $id)->first();

        // validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
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
     * delete agent account
     */
    public function deleteagentaccount($id)
    {
        $agent = User::where('id', $id)->first();
        //unlink image
        if (file_exists($agent->photo)) {
            @unlink($agent->photo);
        }
        // dekete agebt
        $agent->delete();
        // notification
        notyf()->warning('Agent account delete success');
        return back();
    }

    /**
     * agent status change
     */
    public function statusagentaccount(Request $request)
    {

        $agent = User::where('id', $request->id)->first();
        if ($agent->status === 'active') {
            $agent->update([
                'status' => 'inactive',
            ]);
            return response()->json(['success' => 'Agent Deactive success']);
        } else {
            $agent->update([
                'status' => 'active',
            ]);
            return response()->json(['success' => 'Agent Active success']);
        }
    }


    // ================================================================================================
    // -----------------------------------------customer/user global account create-----------------------------------
    // ================================================================================================

    /**
     * admin add agent
     */
    public function addaccount()
    {
        return view('backend.pages.accounts.add-account');
    }

    /**
     * store account
     */
    public function storeaccount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($request->role == 'agent') {
            // profile photo update and unlink
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoname = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                $phtourl = "upload/profile/agent/" . $photoname;
                $photo->move(public_path("upload/profile/agent/"), $photoname);
            }
        } else {
            // profile photo update and unlink
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoname = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                $phtourl = "upload/profile/user/" . $photoname;
                $photo->move(public_path("upload/profile/user/"), $photoname);
            }
        }


        // update data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'photo' => isset($phtourl) ? $phtourl : '',
            'address' => $request->address,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);

        // notification
        notyf()->info('Account create success');
        return back();
    }





    // ================================================================================================
    // -----------------------------------------customer/user
    // ================================================================================================

    /**
     * all account list
     */
    public function allcustomeraccount()
    {
        $allcustomer = User::where('role', 'user')->latest()->get();
        return view('backend.pages.accounts.customer.all-customer', compact('allcustomer'));
    }



    /**
     * admin edit agent account
     */
    public function editcustomeraccount($id)
    {
        $customer = User::where('id', $id)->first();
        return view('backend.pages.accounts.customer.edit-customer', compact('customer'));
    }

    /**
     * update agent account
     */
    public function updatecustomeraccount(Request $request, $id)
    {
        $data = User::where('id', $id)->first();

        // validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
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
     * delete agent account
     */
    public function deletecustomeraccount($id)
    {
        $customer = User::where('id', $id)->first();
        //unlink image
        if (file_exists($customer->photo)) {
            @unlink($customer->photo);
        }
        // dekete agebt
        $customer->delete();
        // notification
        notyf()->warning('Customer account delete success');
        return back();
    }

    /**
     * agent status change
     */
    public function statuscustomeraccount(Request $request)
    {

        $customer = User::where('id', $request->id)->first();
        if ($customer->status === 'active') {
            $customer->update([
                'status' => 'inactive',
            ]);
            return response()->json(['success' => 'Customer Deactive success']);
        } else {
            $customer->update([
                'status' => 'active',
            ]);
            return response()->json(['success' => 'Customer Active success']);
        }
    }
}
