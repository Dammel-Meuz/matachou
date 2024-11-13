@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Dépenses</h1>
        </div>
        <div class="card-body">

            <!-- Bloc pour afficher le message avec la date ou le mois de recherche et le total des prix -->
            @if(session('date_recherche'))
                <div class="alert alert-info d-flex justify-content-between align-items-center">
                    <div>
                        Dépenses effectuées le {{ \Carbon\Carbon::parse(session('date_recherche'))->format('d/m/Y') }}
                        <br>
                        Total des prix : {{ session('total_prix_recherche') }} CFA
                    </div>
                    <form action="{{ route('depenses.annulerRecherche') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Annuler la recherche</button>
                    </form>
                </div>
            @elseif(session('mois_recherche'))
                <div class="alert alert-info d-flex justify-content-between align-items-center">
                    <div>
                        Dépenses effectuées en {{ \Carbon\Carbon::parse(session('mois_recherche'))->formatLocalized('%B %Y') }}
                        <br>
                        <!-- Total des prix : {{ session('total_prix_mois') }} CFA -->
                    </div>
                    <form action="{{ route('depenses.annulerRecherche') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Annuler la recherche</button>
                    </form>
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('search.recherche') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="form-group">
                            <label for="date_saisie">Rechercher par date :</label>
                            <input type="date" name="date_saisie" id="date_saisie" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchByMonth') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="form-group">
                            <label for="search_month">Rechercher par mois :</label>
                            <input type="month" name="search_month" id="search_month" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
                </div>
            </div>

            <a href="{{ route('depenses.create') }}" class="btn btn-primary mb-3">Ajouter Dépense</a>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Prix Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($depenses as $depense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $depense->nom_produit }}</td>
                            <td>{{ $depense->quantité }}</td>
                            <td>{{ $depense->prix_unitaire }}</td>
                            <td>{{ $depense->prix_total }}</td>
                            <td>
                                <a href="{{ route('depenses.show', $depense->id) }}" class="btn btn-info">Détails</a>
                                <a href="{{ route('depenses.edit', $depense->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('depenses.destroy', $depense->id) }}" method="POST" style="display:inline-block;">
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
