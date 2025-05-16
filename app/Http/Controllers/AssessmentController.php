<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Student;
use App\Models\Unit;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('student', 'unit')->get();
        return view('assessments.index', compact('assessments'));
    }

    public function create()
    {
        $students = Student::all();
        $units = Unit::all();
        return view('assessments.create', compact('students', 'units'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'unit_id' => 'required|exists:units,id',
            'grade' => 'required|numeric|min:0|max:10',
        ]);

        Assessment::create($request->all());

        return redirect()->route('assessments.index')->with('success', 'Avaluació creada correctament');
    }

    public function edit(Assessment $assessment)
    {
        $students = Student::all();
        $units = Unit::all();
        return view('assessments.edit', compact('assessment', 'students', 'units'));
    }

    public function update(Request $request, Assessment $assessment)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'unit_id' => 'required|exists:units,id',
            'grade' => 'required|numeric|min:0|max:10',
        ]);

        $assessment->update($request->all());

        return redirect()->route('assessments.index')->with('success', 'Avaluació actualitzada correctament');
    }

    public function destroy(Assessment $assessment)
    {
        $assessment->delete();
        return redirect()->route('assessments.index')->with('success', 'Avaluació eliminada');
    }
}
