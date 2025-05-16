<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Student;
use App\Models\Unit;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    // GET /api/assessments
    public function index()
    {
        $assessments = Assessment::with(['student', 'unit'])->get();

        return response()->json([
            'status' => 'success',
            'assessments' => $assessments,
        ]);
    }

    // POST /api/assessments
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'unit_id' => 'required|exists:units,id',
            'grade' => 'required|numeric|min:0|max:10',
        ]);

        $assessment = Assessment::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Avaluació creada correctament',
            'assessment' => $assessment,
        ], 201);
    }

    // GET /api/assessments/{assessment}
    public function show(Assessment $assessment)
    {
        $assessment->load(['student', 'unit']);

        return response()->json([
            'status' => 'success',
            'assessment' => $assessment,
        ]);
    }

    // PUT /api/assessments/{assessment}
    public function update(Request $request, Assessment $assessment)
    {
        $validated = $request->validate([
            'student_id' => 'sometimes|exists:students,id',
            'unit_id' => 'sometimes|exists:units,id',
            'grade' => 'sometimes|numeric|min:0|max:10',
        ]);

        $assessment->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Avaluació actualitzada correctament',
            'assessment' => $assessment,
        ]);
    }

    // DELETE /api/assessments/{assessment}
    public function destroy(Assessment $assessment)
    {
        $assessment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Avaluació eliminada correctament',
        ]);
    }
}
