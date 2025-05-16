<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Module;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('module')->get();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('teachers.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        Teacher::create($request->only('first_name', 'last_name', 'module_id'));
        return redirect()->route('teachers.index')->with('success', 'Professor creat correctament.');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $modules = Module::all();
        return view('teachers.edit', compact('teacher', 'modules'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        $teacher->update($request->only('first_name', 'last_name', 'module_id'));
        return redirect()->route('teachers.index')->with('success', 'Professor actualitzat.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Professor eliminat.');
    }
}
