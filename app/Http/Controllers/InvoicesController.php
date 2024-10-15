<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Invoices::all();
        return response()->json([
            "success" => true,
            "message" => "Invoices retrieved successfully.", //faktur berhasil terkirim
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
            'jumlah_total' => 'required|numeric',
            'status' => 'required|string',
        ]);
        $data = Invoices::create($validated);
        return response()->json([
            "success" => true,
            "message" => "Invoices created successfully.", //faktur berhasil terkirim
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Invoices::find($id);
        if (!$data) {
            return response()->json([
                "success" => false,
                "message" => "Invoices not found.",
            ], 404);
        }
        return response()->json([
            "success" => true,
            "message" => "Invoices retrieved successfully.",
            "data" => $data
        ], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        $data = Invoices::destroy($invoices);
        return response()->json([
            "success" => true,
            "message" => "Invoices deleted successfully.",
            "data" => $data
        ]);
    }
}
