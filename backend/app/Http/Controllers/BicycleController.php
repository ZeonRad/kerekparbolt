<?php

namespace App\Http\Controllers;

use App\Http\Resources\BicycleResource;
use App\Models\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycles = Bicycle::all();
        return BicycleResource::collection($bicycles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $bicycle = Bicycle::create($request->all());
        return new BicycleResource($bicycle);
    }

    /**
     * Display the specified resource.
     */
    public function show($bicycle) {
        $bicycle = Bicycle::findOrFail($bicycle);
        return new BicycleResource($bicycle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bicycle = Bicycle::findOrFail($id);
        
        $request->validate([
            'name' => 'string|max:255',
            'type' => 'string|max:255',
            'price' => 'numeric',
        ]);

        $bicycle->update($request->all());
        return new BicycleResource($bicycle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bicycle = Bicycle::findOrFail($id);
        $bicycle->delete();
        return new BicycleResource(null, 204);
    }
}
