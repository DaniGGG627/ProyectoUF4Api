<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // GET /api/modules
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'modules' => Module::with('units')->get()
        ]);
    }

    // POST /api/modules
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module = Module::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Mòdul creat correctament',
            'module' => $module,
        ], 201);
    }

    // GET /api/modules/{module}
    public function show(Module $module)
    {
        $module->load('units');

        return response()->json([
            'status' => 'success',
            'module' => $module,
        ]);
    }

    // PUT /api/modules/{module}
    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Mòdul actualitzat correctament',
            'module' => $module,
        ]);
    }

    // DELETE /api/modules/{module}
    public function destroy(Module $module)
    {
        $module->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Mòdul eliminat correctament',
        ]);
    }
}
