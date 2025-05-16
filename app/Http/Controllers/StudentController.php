<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Module;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    $students = Student::with('module')->get(); // Si la relación está definida como 'module'

    return view('students.index', compact('students'));
}



    public function create()
    {
        $modules = Module::all();
        return view('students.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Alumne creat correctament');
    }

    public function edit(Student $student)
    {
        $modules = Module::all();
        return view('students.edit', compact('student', 'modules'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'module_id' => 'required|exists:modules,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Alumne actualitzat correctament');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Alumne eliminat');
    }
}
