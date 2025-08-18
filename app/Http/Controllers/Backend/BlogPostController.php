<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogTag;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblog = BlogPost::with(['blogcategory', 'blogtags'])->latest()->get();
        // return($allblog);
        return view('backend.pages.blog.index', compact('allblog'));
    }
    /**
     * Display a listing of the active blog
     */
    public function activeblog()
    {
        $allblog = BlogPost::where('status', 1)->latest()->get();
        return view('backend.pages.blog.active-blog', compact('allblog'));
    }
    /**
     * Display a listing of the deactive blog
     */
    public function deactiveblog()
    {
        $allblog = BlogPost::where('status', 0)->get();
        return view('backend.pages.blog.deactive-blog', compact('allblog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allblogtag = BlogTag::all();
        $allblogcategory = BlogCategory::all();
        return view('backend.pages.blog.create', compact(['allblogtag', 'allblogcategory']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // validate data
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'required',
            'details' => 'required',
        ]);


        //upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $namethumbnail = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumurl = "upload/blog/" . $namethumbnail;
            $thumbnail->move(public_path("upload/blog/"), $namethumbnail);
        }

        $blogpost =  BlogPost::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => $thumurl,
            'details' => $request->details,
            'status' => $request->status ? $request->status : '1',
            'created_at' => now(),
        ]);

        $blogpost->blogtags()->attach($request->tags);


        // notification
        notyf()->success('blog added success');
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
        $allblogtag = BlogTag::all();
        $allblogcategory = BlogCategory::all();
        $blog = BlogPost::findOrFail($id);
        return view('backend.pages.blog.edit', compact(['allblogtag', 'allblogcategory', 'blog']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $blog = BlogPost::findOrFail($id);

        // validate data
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'nullable',
            'details' => 'required',
        ]);


        //upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $namethumbnail = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumurl = "upload/blog/" . $namethumbnail;
            $thumbnail->move(public_path("upload/blog/"), $namethumbnail);
            //unlink
            if (file_exists($blog->thumbnail)) {
                @unlink($blog->thumbnail);
            }
        }

        $blog->update([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => isset($thumurl) ? $thumurl : $blog->thumbnail,
            'details' => $request->details,
            'status' => $request->status ? $request->status : '1',
            'updated_at' => now(),
        ]);

        $blog->blogtags()->sync($request->tags);
        // notification
        notyf()->success('blog update success');
        return redirect()->route('admin.blog-post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = BlogPost::findOrFail($id);
        if (file_exists($blog->thumbnail)) {
            @unlink($blog->thumbnail);
        }

        $blog->blogtags()->detach();
        //delete blog post
        $blog->delete();
        // notification
        notyf()->warning('blog delete success');
        return back();
    }



    /**
     *  blog status change
     */
    public function blogpoststatus(Request $request)
    {
        $blog = BlogPost::findOrFail($request->id);

        if ($blog->status == 1) {
            $blog->update([
                'status' => 0,
            ]);
            return response()->json([
                'success' => ' blog Status Deactive success',
            ]);
        } else {
            $blog->update([
                'status' => 1,
            ]);
            return response()->json([
                'success' => ' blog Status Active success',
            ]);
        }
    }
}
