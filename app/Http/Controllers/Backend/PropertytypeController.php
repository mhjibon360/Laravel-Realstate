<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\Propertytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allptype = Propertytype::orderBy('id', 'asc')->get();
        return view('backend.pages.property-type.index', compact('allptype'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.property-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'property_typename' => 'required|string|unique:propertytypes,property_typename',
        ]);

        //store data
        Propertytype::create([
            'property_typename' => $request->property_typename,
            'property_typeslug' => Str::slug($request->property_typename),
            'created_at' => now(),
        ]);

        // notification
        notyf()->success('Data store success');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ptype = Propertytype::findOrFail($id);
        return view('backend.pages.property-type.edit', compact('ptype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'property_typename' => 'required|string|unique:propertytypes,property_typename,' . $id,
        ]);

        //store data
        Propertytype::where('id', $id)->update([
            'property_typename' => $request->property_typename,
            'property_typeslug' => Str::slug($request->property_typename),
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return redirect()->route('admin.property-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Propertytype::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
