@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Livreurs</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('livreurs.create') }}" class="btn btn-primary mb-3">Ajouter Livreur</a>
            <table class="table table-striped table-bordered">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Disponibilité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($livreurs as $livreur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $livreur->nom }}</td>
                            <td>{{ $livreur->telephone }}</td>
                            <td>{{ $livreur->disponibilite }}</td>
                            <td>
                                
                                <a href="{{ route('livreurs.show', $livreur->id) }}" class="btn btn-info">Détails</a>
                                <a href="{{ route('livreurs.edit', $livreur->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('livreurs.destroy', $livreur->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
