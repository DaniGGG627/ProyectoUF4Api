@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar UF</h2>
    <form action="{{ route('units.update', $unit) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Títol</label>
            <input type="text" name="title" class="form-control" value="{{ $unit->title }}" required>
        </div>
        <div class="mb-3">
            <label>Contingut</label>
            <textarea name="content" class="form-control">{{ $unit->content }}</textarea>
        </div>
        <div class="mb-3">
            <label>Mòdul associat</label>
            <select name="module_id" class="form-control">
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" @if($unit->module_id == $module->id) selected @endif>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Actualitzar</button>
        <a href="{{ route('units.index') }}" class="btn btn-secondary">Tornar</a>
    </form>
</div>
@endsection
