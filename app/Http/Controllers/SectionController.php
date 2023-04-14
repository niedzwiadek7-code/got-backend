<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return response()->json($sections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->input('name');
        $section->save();
        return response()->json($section);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return response()->json($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $section->name = $request->input('name');
        $section->save();
        return response()->json($section);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return response()->json(['message' => 'Section deleted']);
    }
}
