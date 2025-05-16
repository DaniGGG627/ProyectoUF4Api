@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detall del Mòdul</h2>
    <p><strong>Nom:</strong> {{ $module->name }}</p>
    <p><strong>Descripció:</strong> {{ $module->description }}</p>
    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Tornar</a>
</div>
@endsection
