<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allpcategory = PropertyCategory::orderBy('id','asc')->get();
        return view('backend.pages.property-category.index', compact('allpcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.property-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'category_name' => 'required|string|unique:property_categories,category_name',
            'category_icon' => 'required',
        ]);

        //store data
        PropertyCategory::create([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'category_icon' => $request->category_icon,
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
        $pcategory = PropertyCategory::findOrFail($id);
        return view('backend.pages.property-category.edit', compact('pcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'category_name' => 'required|string|unique:property_categories,category_name,' . $id,
            'category_icon' => 'required',
        ]);

        //store data
        PropertyCategory::where('id', $id)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'category_icon' => $request->category_icon,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return redirect()->route('admin.property-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PropertyCategory::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
