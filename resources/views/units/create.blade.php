@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear UF</h2>
    <form action="{{ route('units.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Títol</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contingut</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Mòdul associat</label>
            <select name="module_id" class="form-control" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('units.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
