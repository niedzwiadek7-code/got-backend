<?php

namespace App\Http\Controllers;

use App\Models\MountainRange;
use Illuminate\Http\Request;

class MountainRangeController extends Controller
{
    public function index()
    {
        $mountainRanges = MountainRange::all();
        return response()->json($mountainRanges);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mountainRange = new MountainRange();
        $mountainRange->name = $request->input('name');
        $mountainRange->mountain_group = $request->input('mountain_group');
        $mountainRange->save();
        return response()->json($mountainRange);
    }

    /**
     * Display the specified resource.
     */
    public function show(MountainRange $mountainRange)
    {
        return response()->json($mountainRange);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MountainRange $mountainRange)
    {
        $mountainRange->name = $request->input('name');
        $mountainRange->mountain_group = $request->input('mountain_group');
        $mountainRange->save();
        return response()->json($mountainRange);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MountainRange $mountainRange)
    {
        $mountainRange->delete();
        return response()->json(['message' => 'Mountain range deleted']);
    }
}
