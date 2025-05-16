@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Mòdul</h2>
    <form action="{{ route('modules.update', $module) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $module->name }}" required>
        </div>
        <div class="mb-3">
            <label>Descripció</label>
            <textarea name="description" class="form-control">{{ $module->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualitzar</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
