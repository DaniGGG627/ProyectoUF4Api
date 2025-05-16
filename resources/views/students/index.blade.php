@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Alumnes</h2>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Nou alumne</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cognoms</th>
                <th>Mòdul</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->module->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Segur que vols eliminar aquest alumne?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
