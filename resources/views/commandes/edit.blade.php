@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Edit Commande</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" id="client_id" class="form-control" required>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ $client->id == $commande->client_id ? 'selected' : '' }}>{{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="adresse_livraison">Adresse de Livraison</label>
                    <input type="text" name="adresse_livraison" id="adresse_livraison" class="form-control" value="{{ $commande->adresse_livraison }}" required>
                </div>
                <!-- Ajoutez ici les champs pour les articles et la quantité -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
