<?php

namespace App\Http\Controllers;

use App\Models\DataKartuKeluarga;
use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;

class DataKartuKeluargaController extends Controller
{
    // Get all records
    public function index()
    {
        // Retrieve all kartu keluarga records, eager load 'anggota' relationship
        return response()->json(DataKartuKeluarga::with('anggota')->get(), 200);
    }

    // Get a single record by ID
    public function show($id)
    {
        // Find a specific kartu keluarga record by ID, eager load 'anggota'
        $data = DataKartuKeluarga::with('anggota')->find($id);
        
        // Return error message if the record is not found
        if (!$data) {
            return response()->json(['message' => 'Kartu Keluarga not found'], 404);
        }

        // Return the found record
        return response()->json($data, 200);
    }

    // Store a new record
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'NoKK' => 'required|string|unique:kartu_keluargas,NoKK',
            'kepala_keluarga' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Create a new DataKartuKeluarga using validated data
        $data = DataKartuKeluarga::create($validated);

        // Return created record
        return response()->json($data, 201);
    }

    // Update an existing record
    public function update(Request $request, $id)
    {
        // Find the record to update
        $data = DataKartuKeluarga::find($id);
        
        // Return error message if the record is not found
        if (!$data) {
            return response()->json(['message' => 'Kartu Keluarga not found'], 404);
        }

        // Validate incoming request, 'sometimes' allows partial updates
        $validated = $request->validate([
            'NoKK' => 'sometimes|string|unique:kartu_keluargas,NoKK,' . $id,
            'kepala_keluarga' => 'sometimes|string',
            'alamat' => 'sometimes|string',
        ]);

        // Update the record with validated data
        $data->update($validated);

        // Return updated record
        return response()->json($data, 200);
    }

    // Delete a record
    public function destroy($id)
    {
        // Find the record to delete
        $data = DataKartuKeluarga::find($id);
        
        // Return error message if the record is not found
        if (!$data) {
            return response()->json(['message' => 'Kartu Keluarga not found'], 404);
        }

        // Delete the record
        $data->delete();

        // Return success message
        return response()->json(['message' => 'Kartu Keluarga deleted successfully'], 200);
    }
}



