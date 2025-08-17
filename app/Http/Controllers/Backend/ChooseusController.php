<?php

namespace App\Http\Controllers\Backend;

use App\Models\ChooseUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChooseusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allpchooseus = ChooseUs::orderBy('id', 'asc')->get();
        return view('backend.pages.chooseus.index', compact('allpchooseus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.chooseus.create');
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
            'details' => 'required',
        ]);

        //store data
        ChooseUs::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'details' => $request->details,
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
        $choose = ChooseUs::findOrFail($id);
        return view('backend.pages.chooseus.edit', compact('choose'));
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
        ChooseUs::where('id', $id)->update([
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
        ChooseUs::findOrFail($id)->delete();
        // notification
        notyf()->warning('Data delete success');
        return back();
    }
}
