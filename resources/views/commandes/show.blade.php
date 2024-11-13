@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Commande Details</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Client:</strong> {{ $commande->client->name }}
            </div>
            <div class="mb-3">
                <strong>Adresse de Livraison:</strong> {{ $commande->adresse_livraison }}
            </div>
            <div class="mb-3">
                <strong>Articles Commandés:</strong>
                <ul>
                    @foreach($commande->articles as $article)
                        <li>{{ $article->title }} ({{ $article->pivot->quantite }})</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-3">
                <strong>Prix Total:</strong> {{ $commande->prix_total }}
            </div>
            <div class="mb-3">
                <strong>Etat:</strong> {{ $commande->etat }}
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('commandes.index') }}" class="btn btn-primary">Back to Commandes</a>
                <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
