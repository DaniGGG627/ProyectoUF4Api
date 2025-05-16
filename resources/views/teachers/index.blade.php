@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Professors</h2>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Nou professor</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Mòdul</th>
            <th>Accions</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->last_name }}</td>
            <td>{{ $teacher->module->name }}</td>
            <td>
                <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-info btn-sm">Veure</a>
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Segur que vols eliminar-lo?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
