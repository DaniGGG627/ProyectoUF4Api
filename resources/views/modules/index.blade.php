@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mòduls</h2>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Crear Mòdul</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Descripció</th>
            <th>Accions</th>
        </tr>
        @foreach ($modules as $module)
        <tr>
            <td>{{ $module->name }}</td>
            <td>{{ $module->description }}</td>
            <td>
                <a href="{{ route('modules.show', $module) }}" class="btn btn-info btn-sm">Veure</a>
                <a href="{{ route('modules.edit', $module) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('modules.destroy', $module) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Segur que vols eliminar aquest mòdul?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
