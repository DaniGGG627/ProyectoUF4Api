@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Avaluació</h2>

    <form action="{{ route('assessments.update', $assessment) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">Alumne</label>
            <select name="student_id" id="student_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $assessment->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="unit_id" class="block text-sm font-medium text-gray-700 mb-1">Unitat Formativa</label>
            <select name="unit_id" id="unit_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ $assessment->unit_id == $unit->id ? 'selected' : '' }}>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="grade" class="block text-sm font-medium text-gray-700 mb-1">Nota</label>
            <input type="number" step="0.01" min="0" max="10" name="grade" id="grade"
                class="w-full border border-gray-300 rounded px-3 py-2"
                value="{{ $assessment->grade }}" required>
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Actualitzar</button>
            <a href="{{ route('assessments.index') }}" class="text-gray-600 hover:text-gray-900 underline">Tornar</a>
        </div>
    </form>
</div>
@endsection
