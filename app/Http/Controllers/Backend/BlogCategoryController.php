<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblogcategory = BlogCategory::latest()->get();
        return view('backend.pages.blog-category.index', compact('allblogcategory'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'category_name' => 'required|string|unique:blog_categories,category_name',
        ]);

        //store data
        BlogCategory::create([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'status' => 1,
            'created_at' => now(),
        ]);

        // notification
        notyf()->success('Data store success');
        return back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// validate
        $request->validate([
            'category_name' => 'required|string|unique:blog_categories,category_name,' . $id,
        ]);

        //store data
        BlogCategory::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'status' => 1,
            'created_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogCategory::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
