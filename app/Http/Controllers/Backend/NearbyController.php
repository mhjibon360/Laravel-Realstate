<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nearby;
use Illuminate\Http\Request;

class NearbyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->nearby_group_name) {
            foreach ($request->nearby_group_name as $key => $faci) {
                Nearby::insert([
                    'property_id' => $request->pid,
                    'nearby_group_name' => $faci,
                    'nearby_group_title' => $request->nearby_group_title[$key],
                ]);
            }
        }
        // notification
        notyf()->success('Nearyby facility store success');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Nearby::where('id', $id)->delete();
        // notification
        notyf()->warning('Nearyby facility delete success');
        return back();
    }
}
