<?php

namespace App\Http\Controllers;

use App\Models\MountainRange;
use App\Models\Section;
use App\Models\TerrainPoint;
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
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/[a-zA-Z]+/',
            'mountain_range_id' => 'required|integer',
            'terrain_point_a_id' => 'required|integer',
            'terrain_point_b_id' => 'required|integer',
            'badge_points_a_to_b' => 'required|integer',
            'badge_points_b_to_a' => 'required|integer',
        ]);

        $section = new Section();
        $section->name = $validatedData['name'];
        $section->description = $request->input('description');
        $section->mountain_range_id = $validatedData['mountain_range_id'];
        $section->terrain_point_a_id = $validatedData['terrain_point_a_id'];
        $section->terrain_point_b_id = $validatedData['terrain_point_b_id'];
        $section->badge_points_a_to_b = $validatedData['badge_points_a_to_b'];
        $section->badge_points_b_to_a = $validatedData['badge_points_b_to_a'];
        $section->intermediate_points = json_encode($request->input('intermediate_points'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/[a-zA-Z]+/',
            'mountain_range_id' => 'required|integer',
            'terrain_point_a_id' => 'required|integer',
            'terrain_point_b_id' => 'required|integer',
            'badge_points_a_to_b' => 'required|integer',
            'badge_points_b_to_a' => 'required|integer',
        ]);

        $section->name = $validatedData['name'];
        $section->description = $request->input('description');
        $section->mountain_range_id = $validatedData['mountain_range_id'];
        $section->terrain_point_a_id = $validatedData['terrain_point_a_id'];
        $section->terrain_point_b_id = $validatedData['terrain_point_b_id'];
        $section->badge_points_a_to_b = $validatedData['badge_points_a_to_b'];
        $section->badge_points_b_to_a = $validatedData['badge_points_b_to_a'];
        $section->intermediate_points = json_encode($request->input('intermediate_points'));
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

    public function terrainPoints(Section $section)
    {
        return [
            'terrain_point_a' => $section->terrainPointA()->get(),
            'terrain_point_b' => $section->terrainPointB()->get()
        ];
    }

    public function getSectionsForTripPlanning(MountainRange $mountainRange, TerrainPoint $terrainPoint = null)
    {
        if ($terrainPoint == null) {
            $terrainPointId = 0;
        } else {
            $terrainPointId = $terrainPoint->id;
        }

        return Section::where('mountain_range_id', $mountainRange->id)
            ->where(function ($query) use ($terrainPointId) {
                $query->where('terrain_point_a_id', $terrainPointId)
                    ->where('badge_points_a_to_b', '>', 0)
                    ->orWhere('terrain_point_b_id', $terrainPointId)
                    ->where('badge_points_b_to_a', '>', 0);
            })
            ->union(
                Section::where('mountain_range_id', $mountainRange->id)
                    ->where(function ($query) use ($terrainPointId) {
                        $query->where('terrain_point_a_id', '!=', $terrainPointId)
                            ->where('terrain_point_b_id', '!=', $terrainPointId);
                    })
            )
            ->get();
    }
}
