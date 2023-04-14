<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class MountainRangeController extends Controller
{
    public function index()
    {
        $mountainRanges = Section::all();
        return response()->json($mountainRanges);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mountainRange = new Section();
        $mountainRange->name = $request->input('name');
        $mountainRange->save();
        return response()->json($mountainRange);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $mountainRange)
    {
        return response()->json($mountainRange);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $mountainRange)
    {
        $mountainRange->name = $request->input('name');
        $mountainRange->save();
        return response()->json($mountainRange);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $mountainRange)
    {
        $mountainRange->delete();
        return response()->json(['message' => 'Mountain group deleted']);
    }
}
