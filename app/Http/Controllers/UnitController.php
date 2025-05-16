<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Module;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with('module')->get();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('units.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        Unit::create($request->only('title', 'content', 'module_id'));

        return redirect()->route('units.index')->with('success', 'UF creada correctament.');
    }

    public function show(Unit $unit)
    {
        return view('units.show', compact('unit'));
    }

    public function edit(Unit $unit)
    {
        $modules = Module::all();
        return view('units.edit', compact('unit', 'modules'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'title' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        $unit->update($request->only('title', 'content', 'module_id'));

        return redirect()->route('units.index')->with('success', 'UF actualitzada correctament.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')->with('success', 'UF eliminada correctament.');
    }
}
