<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allplatform = Platform::orderBy('id', 'asc')->get();
        return view('backend.pages.platform.index', compact('allplatform'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.platform.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'heading' => 'required',
            'link' => 'required',
        ]);

        //store data
        Platform::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'heading' => $request->heading,
            'link' => $request->link,
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
        $choose = Platform::findOrFail($id);
        return view('backend.pages.platform.edit', compact('choose'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);

        //store data
        Platform::where('id', $id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'details' => $request->details,
            'updated_at' => now(),
        ]);

        // notification
        notyf()->info('Data update success');
        return redirect()->route('admin.us.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Platform::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
