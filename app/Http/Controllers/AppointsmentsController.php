<?php

namespace App\Http\Controllers;

use App\Models\Appointsments;
use Illuminate\Http\Request;

class AppointsmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Appointsments::with(['vehicle', 'mechanic'])->get();
        return response()->json([
            "success" => true,
            "message" => "Appointsments retrieved successfully.",
            "data" => $data
        ], 200);
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
        $validated = $request->validate([
           'vehicle_id' => 'required|numeric',
           'mechanic_id' => 'required|numeric',
           'appointment_date' => 'required|date',
           'status' => 'required|string',
        ]);

        $data = Appointsments::create($validated);

        return response()->json([
            "success" => true,
            "message" => "Appointsments created successfully.",
            "data" => $data
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Appointsments::findOrFail($id);
        return response()->json([
            "success" => true,
            "message" => "Appointsments retrieved successfully.",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointsments $appointsments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointsments $appointsments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Appointsments::destroy($id);
        return response()->json([
            "success" => true,
            "message" => "Appointsments deleted successfully.",
            "data" => $data
        ]);
        
    }
}
