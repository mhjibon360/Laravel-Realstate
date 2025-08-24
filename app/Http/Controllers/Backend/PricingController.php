<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allplan = Pricing::all();
        return view('backend.pages.package.index', compact('allplan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'package_name' => 'required',
            'package_icon' => 'required',
            'package_price' => 'required',
            'package_validitytime' => 'required',
            'account_dashboard' => 'required',
        ]);
        Pricing::insert([
            'package_property' => $request->package_property,
            'package_cardcolor' => $request->package_cardcolor,
            'package_name' => $request->package_name,
            'package_icon' => $request->package_icon,
            'package_price' => $request->package_price,
            'package_validitytime' => $request->package_validitytime,
            'account_dashboard' => $request->account_dashboard,
            'account_dashboard_status' => $request->account_dashboard_status,
            'invoice' => $request->invoice,
            'invoice_status' => $request->invoice_status,
            'online_payment' => $request->online_payment,
            'online_payment_status' => $request->online_payment_status,
            'brand_website' => $request->brand_website,
            'brand_website_status' => $request->brand_website_status,
            'account_manager' => $request->account_manager,
            'account_manager_status' => $request->account_manager_status,
            'premium_app' => $request->premium_app,
            'premium_app_status' => $request->premium_app_status,
            'created_at' => now(),
        ]);
        // notification
        notyf()->success('Pricing plan generate success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = Pricing::findOrFail($id);
        return view('backend.pages.package.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'package_name' => 'required',
            'package_icon' => 'required',
            'package_price' => 'required',
            'package_validitytime' => 'required',
            'account_dashboard' => 'required',
        ]);
        Pricing::where('id', $id)->update([
            'package_property' => $request->package_property,
            'package_cardcolor' => $request->package_cardcolor,
            'package_name' => $request->package_name,
            'package_icon' => $request->package_icon,
            'package_price' => $request->package_price,
            'package_validitytime' => $request->package_validitytime,
            'account_dashboard' => $request->account_dashboard,
            'account_dashboard_status' => $request->account_dashboard_status,
            'invoice' => $request->invoice,
            'invoice_status' => $request->invoice_status,
            'online_payment' => $request->online_payment,
            'online_payment_status' => $request->online_payment_status,
            'brand_website' => $request->brand_website,
            'brand_website_status' => $request->brand_website_status,
            'account_manager' => $request->account_manager,
            'account_manager_status' => $request->account_manager_status,
            'premium_app' => $request->premium_app,
            'premium_app_status' => $request->premium_app_status,
            'updated_at' => now(),
        ]);
        // notification
        notyf()->info('Pricing plan update success');
        return redirect()->route('admin.package-plan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pricing::where('id', $id)->delete();
        // notification
        notyf()->warning('Pricing plan delete success');
        return back();
    }
}
