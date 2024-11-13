@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Commandes</h1>
    <div class="mb-3">
        <a href="{{ route('commandes.create') }}" class="btn btn-primary">Add Command</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Client</th>
                <th>Adresse Livraison</th>
                <th>Articles</th>
                <th>Prix Total</th>
                <th>Etat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->client->nom }}</td>
                    <td>{{ $commande->adresse_livraison }}</td>
                    <td>
                        <ul>
                            @foreach($commande->articles as $article)
                                <li>{{ $article->title }} ({{ $article->pivot->quantite }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $commande->prix_total }}</td>
                    <td>
                        <form action="{{ route('commandes.updateStatus', $commande->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="etat" class="form-control" onchange="this.form.submit()">
                                <option value="en attente" {{ $commande->etat == 'en attente' ? 'selected' : '' }}>En attente</option>
                                <option value="en cours" {{ $commande->etat == 'en cours' ? 'selected' : '' }}>En cours</option>
                                <option value="livré" {{ $commande->etat == 'livré' ? 'selected' : '' }}>Livré</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $commandes->links() }}
    </div>
</div>
@endsection
