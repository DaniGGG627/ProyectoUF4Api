@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Avaluacions</h2>

    <a href="{{ route('assessments.create') }}"
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Nova avaluació
    </a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                    <th class="py-3 px-4">Alumne</th>
                    <th class="py-3 px-4">Unitat formativa</th>
                    <th class="py-3 px-4">Nota</th>
                    <th class="py-3 px-4">Accions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($assessments as $assessment)
                <tr>
                    <td class="py-3 px-4">
                        {{ $assessment->student->first_name }} {{ $assessment->student->last_name }}
                    </td>
                    <td class="py-3 px-4">
                        {{ $assessment->unit->title }}
                    </td>
                    <td class="py-3 px-4">
                        {{ $assessment->grade }}
                    </td>
                    <td class="py-3 px-4 space-x-2">
                        <a href="{{ route('assessments.edit', $assessment) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 transition">
                            Editar
                        </a>
                        <form action="{{ route('assessments.destroy', $assessment) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Segur que vols eliminar aquesta avaluació?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
