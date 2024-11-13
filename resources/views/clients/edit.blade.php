@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Edit Client</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom">Name:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $client->nom }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $client->phone }}" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Address:</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $client->adresse }}" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
