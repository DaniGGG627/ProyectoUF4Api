<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    // GET /api/units
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'units' => Unit::with('module')->get()
        ]);
    }

    // POST /api/units
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        $unit = Unit::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Unitat Formativa creada correctament',
            'unit' => $unit,
        ], 201);
    }

    // GET /api/units/{unit}
    public function show(Unit $unit)
    {
        $unit->load('module');

        return response()->json([
            'status' => 'success',
            'unit' => $unit,
        ]);
    }

    // PUT /api/units/{unit}
    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string|nullable',
            'module_id' => 'sometimes|exists:modules,id',
        ]);

        $unit->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Unitat Formativa actualitzada correctament',
            'unit' => $unit,
        ]);
    }

    // DELETE /api/units/{unit}
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Unitat Formativa eliminada correctament',
        ]);
    }
}
