<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicles::with('user')->get();
        return response()->json([
            "success" => true,
            "message" => "Vehicles retrieved successfully.",
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
           'user_id' => 'required|numeric',
           'plat_nomor' => 'required|string',
           'merek' => 'required|string',
           'model' => 'required|string',
           'tahun' => 'required|numeric',
        ]);

        $data = Vehicles::create($validated);

        return response()->json([
            "success" => true,
            "message" => "Vehicles created successfully.",
            "data" => $data
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data = Vehicles::findOrFail($id);
        return response()->json([
            "success" => true,
            "message" => "Vehicles retrieved successfully.",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicles $vehicles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicles $vehicles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicles $vehicles)
    {
        $data = Vehicles::destroy($vehicles);
        return response()->json([
            "success" => true,
            "message" => "Vehicles deleted successfully.",
            "data" => $data
        ]);
    }
}
