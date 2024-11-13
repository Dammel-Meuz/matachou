@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Détails du Livreur</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $livreur->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Nom:</strong> {{ $livreur->nom }}
                    </div>
                    <div class="mb-3">
                        <strong>Téléphone:</strong> {{ $livreur->telephone }}
                    </div>
                    <div class="mb-3">
                        <strong>Disponibilité:</strong> {{ $livreur->disponibilite }}
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('livreurs.edit', $livreur->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('livreurs.destroy', $livreur->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <a href="{{ route('livreurs.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
