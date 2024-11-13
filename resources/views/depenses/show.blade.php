@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Détails de la Dépense</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $depense->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Nom du produit:</strong> {{ $depense->nom_produit }}
                    </div>
                    <div class="mb-3">
                        <strong>Quantité:</strong> {{ $depense->quantité }}
                    </div>
                    <div class="mb-3">
                        <strong>Prix Unitaire:</strong> {{ $depense->prix_unitaire }}
                    </div>
                    <div class="mb-3">
                        <strong>Prix Total:</strong> {{ $depense->prix_total }}
                    </div>
                    <div class="mb-3">
                        <strong>Date et Heure:</strong> {{ $depense->created_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('depenses.edit', $depense->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('depenses.destroy', $depense->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <a href="{{ route('depenses.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
