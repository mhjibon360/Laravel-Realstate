<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /** general setting veiw */
    public function generalsetting()
    {
        $genealsetting = GeneralSetting::first();
        $seosetting = SeoSetting::first();
        return view('backend.pages.setting.setting', compact(['genealsetting', 'seosetting']));
    }

    /** general setting udpate */
    public function generalsettingupdate(Request $request)
    {

        $gseting =   GeneralSetting::where('id', $request->id)->first();

        $request->validate([
            'address' => 'required',
            'number' => 'required',
            'gmail' => 'required',
        ]);

        // header logo
        if ($request->hasFile('header_logo')) {
            $header_logo = $request->file('header_logo');
            $hlogoname = hexdec(uniqid()) . '.' . $header_logo->getClientOriginalExtension();
            $hlurl = "upload/setting/" . $hlogoname;
            $header_logo->move(public_path("upload/setting/"), $hlogoname);
            if (file_exists($gseting->header_logo)) {
                @unlink($gseting->header_logo);
            }
        }

        // footer logo
        if ($request->hasFile('footer_logo')) {
            $footer_logo = $request->file('footer_logo');
            $flogoname = hexdec(uniqid()) . '.' . $footer_logo->getClientOriginalExtension();
            $flurl = "upload/setting/" . $flogoname;
            $footer_logo->move(public_path("upload/setting/"), $flogoname);
            if (file_exists($gseting->footer_logo)) {
                @unlink($gseting->footer_logo);
            }
        }

        $gseting->update([
            'address' => $request->address,
            'number' => $request->number,
            'gmail' => $request->gmail,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'pinterest' => $request->pinterest,
            'google' => $request->google,
            'vimo' => $request->vimo,
            'about_details' => $request->about_details,
            'header_logo' => isset($hlurl) ? $hlurl : $gseting->header_logo,
            'footer_logo' => isset($flurl) ? $flurl : $gseting->footer_logo,
            'updated_at' => now(),
        ]);
        // notification
        notyf()->info('General setting update success');
        return back();
    }



    /** general setting udpate */
    public function seosettingupdate(Request $request)
    {
        $request->validate([
            'author_name' => 'required',
            'organization_name' => 'required',
            'author_details' => 'required',
            'seo_title' => 'required',
            'seo_details' => 'required',
        ]);

        SeoSetting::where('id', $request->id)->update([
            'author_name' => $request->author_name,
            'organization_name' => $request->organization_name,
            'author_details' => $request->author_details,
            'seo_title' => $request->seo_title,
            'seo_details' => $request->seo_details,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Seo setting update success');
        return back();
    }
}
