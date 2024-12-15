<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Manufacturer::query();
        $manufacturers = $query->orderBy('name')->get();
        return ManufacturerResource::collection($manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
        ]);

        $manufacturer = Manufacturer::create($request->all());
        return new ManufacturerResource($manufacturer);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return new ManufacturerResource($manufacturer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
        ]);

        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->all());
        return new ManufacturerResource($manufacturer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        if (!$manufacturer) {
            return new ManufacturerResource(['message' => 'Manufacturer not found'], 404);
        }
    
        $manufacturer->delete();
        return new ManufacturerResource(['message' => 'Manufacturer deleted successfully'], 200);
        
    }
}
