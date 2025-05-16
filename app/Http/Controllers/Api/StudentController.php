<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /api/students
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'students' => Student::with(['user', 'module'])->get(),
        ]);
    }

    // POST /api/students
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'module_id' => 'required|exists:modules,id',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiant creat correctament',
            'student' => $student,
        ], 201);
    }

    // GET /api/students/{student}
    public function show(Student $student)
    {
        $student->load(['user', 'module']);

        return response()->json([
            'status' => 'success',
            'student' => $student,
        ]);
    }

    // PUT /api/students/{student}
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'module_id' => 'sometimes|exists:modules,id',
        ]);

        $student->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiant actualitzat correctament',
            'student' => $student,
        ]);
    }

    // DELETE /api/students/{student}
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiant eliminat correctament',
        ]);
    }
}
