@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nou alumne</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">Nom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Cognoms</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="module_id" class="form-label">Mòdul assignat</label>
            <select name="module_id" id="module_id" class="form-control" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Crear</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
