@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Unitats formatives</h2>
    <a href="{{ route('units.create') }}" class="btn btn-primary mb-3">Crear UF</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Títol</th>
            <th>Contingut</th>
            <th>Mòdul</th>
            <th>Accions</th>
        </tr>
        @foreach ($units as $unit)
        <tr>
            <td>{{ $unit->title }}</td>
            <td>{{ $unit->content }}</td>
            <td>{{ $unit->module->name }}</td>
            <td>
                <a href="{{ route('units.show', $unit) }}" class="btn btn-info btn-sm">Veure</a>
                <a href="{{ route('units.edit', $unit) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
