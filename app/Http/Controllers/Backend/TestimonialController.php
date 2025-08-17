<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltestimonial = Testimonial::latest()->get();
        return view('backend.pages.testimonial.index', compact('alltestimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate
        $request->validate([
            'client_image' => 'required',
            'client_message' => 'required',
            'client_name' => 'required',
            'client_profession' => 'required',
        ]);

        // banner update and unlink
        if ($request->hasFile('client_image')) {
            $client_image = $request->file('client_image');
            $name = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
            $phtourl = "upload/testimonial/" . $name;
            $client_image->move(public_path("upload/testimonial/"), $name);
        }

        //update
        Testimonial::insert([
            'client_image' => $phtourl,
            'client_message' => $request->client_message,
            'client_name' => $request->client_name,
            'client_profession' => $request->client_profession,
            'created_at' => now(),
        ]);

        // notification
        notyf()->info('Testimonial added success');
        return back();
    }

    public function show(Request $request, $id)
    {
        return ($request->all());
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // validate
        $request->validate([
            'client_image' => 'nullable',
            'client_message' => 'required',
            'client_name' => 'required',
            'client_profession' => 'required',
        ]);

        // banner update and unlink
        if ($request->hasFile('client_image')) {
            $client_image = $request->file('client_image');
            $name = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
            $phtourl = "upload/testimonial/" . $name;
            $client_image->move(public_path("upload/testimonial/"), $name);
            if (file_exists($testimonial->client_image)) {
                @unlink($testimonial->client_image);
            }
        }

        //update
        $testimonial->update([
            'client_image' => isset($phtourl) ? $phtourl : $testimonial->client_image,
            'client_message' => $request->client_message,
            'client_name' => $request->client_name,
            'client_profession' => $request->client_profession,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Testimonial update success');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if (file_exists($testimonial->client_image)) {
            @unlink($testimonial->client_image);
        }

        $testimonial->delete();
        // notification
        notyf()->info('Testimonial delete success');
        return redirect()->back();
    }

    /**
     * testimonial status
     */
    public function testimonialstatus(Request $request)
    {
        $testimonial = Testimonial::findOrFail($request->id);
        if ($testimonial->status == '1') {
            $testimonial->update([
                'status' => 0,
            ]);
            return response()->json(['success' => 'Testimonial Deactive success']);
        } else {
            $testimonial->update([
                'status' => 1,
            ]);
            return response()->json(['success' => 'Testimonial Active success']);
        }
    }
}
