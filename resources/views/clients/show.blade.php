@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Client Details</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $client->nom }}</h5>
            <p class="card-text">Phone: {{ $client->phone }}</p>
            <p class="card-text">Address: {{ $client->adresse }}</p>
            <a href="{{ route('clients.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
