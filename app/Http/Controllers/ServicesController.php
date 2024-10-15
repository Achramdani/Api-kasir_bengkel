<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Services::all();
        return response()->json([
            "success" => true,
            "message" => "Services retrieved successfully.",
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
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $data = Services::create($validated);

        return response()->json([
            "success" => true,
            "message" => "Services created successfully.",
            "data" => $data
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Services::find($id);
        if (!$data) {
            return response()->json([
                "success" => false,
                "message" => "Services not found.",
            ], 404);
        }
        return response()->json([
            "success" => true,
            "message" => "Services retrieved successfully.",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Services::destroy($id);
        return response()->json([
            "success" => true,
            "message" => "Services deleted successfully.",
            "data" => $data
        ]);
    }
}
