@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Modifier le Livreur</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('livreurs.update', $livreur->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $livreur->nom }}" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $livreur->telephone }}" required>
                </div>
                <div class="form-group">
                    <label for="disponibilite">Disponibilité</label>
                    <select id="disponibilite" name="disponibilite" class="form-control" required>
                        <option value="disponible">Disponible</option>
                        <option value="occupe">Occupé</option>
                    </select>
                </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    <a href="{{ route('livreurs.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
