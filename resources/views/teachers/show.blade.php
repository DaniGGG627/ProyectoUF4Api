@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detall Professor</h2>
    <p><strong>Nom:</strong> {{ $teacher->first_name }}</p>
    <p><strong>Cognoms:</strong> {{ $teacher->last_name }}</p>
    <p><strong>Mòdul:</strong> {{ $teacher->module->name }}</p>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Tornar</a>
</div>
@endsection
