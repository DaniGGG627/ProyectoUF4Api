@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detall UF</h2>
    <p><strong>Títol:</strong> {{ $unit->title }}</p>
    <p><strong>Contingut:</strong> {{ $unit->content }}</p>
    <p><strong>Mòdul:</strong> {{ $unit->module->name }}</p>
    <a href="{{ route('units.index') }}" class="btn btn-secondary">Tornar</a>
</div>
@endsection
