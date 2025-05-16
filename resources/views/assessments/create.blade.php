@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Nova Avaluació</h2>

    <form action="{{ route('assessments.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">Alumne</label>
            <select name="student_id" id="student_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="unit_id" class="block text-sm font-medium text-gray-700 mb-1">Unitat Formativa</label>
            <select name="unit_id" id="unit_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="grade" class="block text-sm font-medium text-gray-700 mb-1">Nota</label>
            <input type="number" step="0.01" min="0" max="10" name="grade" id="grade"
                class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Desar</button>
            <a href="{{ route('assessments.index') }}" class="text-gray-600 hover:text-gray-900 underline">Tornar</a>
        </div>
    </form>
</div>
@endsection
