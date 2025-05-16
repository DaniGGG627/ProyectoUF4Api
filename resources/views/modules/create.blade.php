@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Mòdul</h2>
    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripció</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
