<?php

namespace App\Http\Controllers;

use App\Models\TerrainPoint;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TerrainPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terrainPoints = TerrainPoint::all();
        return response()->json($terrainPoints);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $terrainPoint = new TerrainPoint();
        $terrainPoint->name = $request->input('name');
        $terrainPoint->description = $request->input('description');
        $terrainPoint->sea_level_height = $request->input('sea_level_height');
        $terrainPoint->latitude = $request->input('latitude');
        $terrainPoint->longitude = $request->input('longitude');
        $terrainPoint->save();
        return response()->json($terrainPoint);
    }

    /**
     * Display the specified resource.
     */
    public function show(TerrainPoint $terrainPoint)
    {
        return response()->json($terrainPoint);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TerrainPoint $terrainPoint)
    {
        $terrainPoint->name = $request->input('name');
        $terrainPoint->description = $request->input('description');
        $terrainPoint->sea_level_height = $request->input('sea_level_height');
        $terrainPoint->latitude = $request->input('latitude');
        $terrainPoint->longitude = $request->input('longitude');
        $terrainPoint->save();
        return response()->json($terrainPoint);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TerrainPoint $terrainPoint)
    {
        $terrainPoint->delete();
        return response()->json(['message' => 'Terrain point deleted']);
    }
}

