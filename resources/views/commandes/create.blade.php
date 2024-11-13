@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Create Commande</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('commandes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" id="client_id" class="form-control" required>
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }}</option> <!-- ici, j'ai changé $client->name en $client->nom -->
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="adresse_livraison">Adresse de Livraison</label>
                    <input type="text" name="adresse_livraison" id="adresse_livraison" class="form-control" required>
                </div>
                <div class="articles-container">
                    <div class="article-group">
                        <div class="form-group">
                            <label for="article_1">Article</label>
                            <select name="articles[1][article_id]" id="article_1" class="form-control" required>
                                <option value="">Select Article</option>
                                @foreach($articles as $article)
                                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantite_1">Quantité</label>
                            <input type="number" name="articles[1][quantite]" id="quantite_1" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="add-article">Add Article</button>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-article').addEventListener('click', function () {
            const container = document.querySelector('.articles-container');
            const index = container.querySelectorAll('.article-group').length + 1;
            const newArticle = `
                <div class="article-group">
                    <div class="form-group">
                        <label for="article_${index}">Article</label>
                        <select name="articles[${index}][article_id]" id="article_${index}" class="form-control" required>
                            <option value="">Select Article</option>
                            @foreach($articles as $article)
                                <option value="{{ $article->id }}">{{ $article->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantite_${index}">Quantité</label>
                        <input type="number" name="articles[${index}][quantite]" id="quantite_${index}" class="form-control" required>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newArticle);
        });
    });
</script>
@endpush
