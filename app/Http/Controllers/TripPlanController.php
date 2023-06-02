<?php

namespace App\Http\Controllers;

use App\Models\TripPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tripPlans = TripPlan::all()->where('user_id', '=', Auth::user()->id);
        return response()->json($tripPlans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/[a-zA-Z]+/'
        ]);

        $tripPlan = new TripPlan();
        $tripPlan->name = $validatedData['name'];
        $tripPlan->description = $request->description;
        $tripPlan->user_id = Auth::user()->id;
        $tripPlan->save();
        return response()->json($tripPlan);
    }

    /**
     * Display the specified resource.
     */
    public function show(TripPlan $tripPlan)
    {
        return TripPlan::query()
            ->with('tripPlanEntries')
            ->where('id' ,'=', $tripPlan->id)
            ->get()->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TripPlan $tripPlan)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/[a-zA-Z]+/'
        ]);

        $tripPlan->name = $validatedData['name'];
        $tripPlan->description = $request->description;
        $tripPlan->user_id = Auth::user()->id;
        $tripPlan->save();
        return response()->json($tripPlan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripPlan $tripPlan)
    {
        $tripPlan->delete();
        return response()->json(['message' => 'Trip plan deleted']);
    }
}
