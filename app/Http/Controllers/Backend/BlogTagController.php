<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblogtag = BlogTag::orderBy('id', 'asc')->get();
        return view('backend.pages.blog-tag.index', compact('allblogtag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.blog-tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'tag_name' => 'required|string|unique:blog_tags,tag_name',
        ]);

        //store data
        BlogTag::create([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
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
        $tag = BlogTag::findOrFail($id);
        return view('backend.pages.blog-tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'tag_name' => 'required|string|unique:blog_tags,tag_name,' . $id,
        ]);

        //store data
        BlogTag::where('id', $id)->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return redirect()->route('admin.blog-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogTag::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
