<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('property_id', $request->id)->first();
            if ($exists) {
                return response()->json(['error' => 'This property alreay in your wishlist']);
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'property_id' => $request->id,
                ]);
                return response()->json(['success' => 'Property added on wishlist']);
            }
        } else {
            return response()->json(['error' => 'please login to wishlist property']);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
