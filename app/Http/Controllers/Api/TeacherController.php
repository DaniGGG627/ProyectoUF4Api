<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // GET /api/teachers
    public function index()
{
    return response()->json([
        'status' => 'success',
        'teachers' => Teacher::all()
    ]);
}


    // POST /api/teachers
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'module_id' => 'nullable|exists:modules,id',
    ]);

    $teacher = Teacher::create($validated);

    return response()->json([
        'status' => 'success',
        'message' => 'Professor creat correctament',
        'teacher' => $teacher,
    ], 201);
}


    // GET /api/teachers/{teacher}
    public function show(Teacher $teacher)
{
    return response()->json([
        'status' => 'success',
        'teacher' => $teacher,
    ]);
}

    // PUT /api/teachers/{teacher}
    public function update(Request $request, Teacher $teacher)
{
    $validated = $request->validate([
        'first_name' => 'sometimes|string',
        'last_name' => 'sometimes|string',
        'module_id' => 'nullable|exists:modules,id',
    ]);

    $teacher->update($validated);

    return response()->json([
        'status' => 'success',
        'message' => 'Professor actualitzat correctament',
        'teacher' => $teacher,
    ]);
}


    // DELETE /api/teachers/{teacher}
    public function destroy(Teacher $teacher)
{
    $teacher->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Professor eliminat correctament',
    ]);
}

}
