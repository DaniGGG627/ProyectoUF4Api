@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar professor</h2>

    <form action="{{ route('teachers.update', $teacher) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">Nom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $teacher->first_name }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Cognoms</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $teacher->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="module_id" class="form-label">Mòdul</label>
            <select name="module_id" id="module_id" class="form-control" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ $teacher->module_id == $module->id ? 'selected' : '' }}>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Actualitzar</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
