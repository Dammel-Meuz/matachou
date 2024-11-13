@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center mb-0">Ajouter Dépenses</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('depenses.store') }}" method="POST">
                @csrf
                <div id="articles">
                    <div class="article mb-3">
                        <div class="form-group">
                            <label for="nom_produit_1">Nom du produit 1</label>
                            <input type="text" name="nom_produit[]" id="nom_produit_1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quantité_1">Quantité</label>
                            <input type="number" name="quantité[]" id="quantité_1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="prix_unitaire_1">Prix Unitaire</label>
                            <input type="number" step="0.01" name="prix_unitaire[]" id="prix_unitaire_1" class="form-control" required>
                        </div>
                        <!-- Barre noire épaisse -->
                        <hr style="border-top: 6px solid black; margin: 40px 0;">
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addArticle()">Nouveau Article</button>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                    <a href="{{ route('depenses.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let articleCount = 1;

    function addArticle() {
        articleCount++;
        const articlesContainer = document.getElementById('articles');
        const newArticle = document.createElement('div');
        newArticle.classList.add('article', 'mb-3');

        const formGroupNom = document.createElement('div');
        formGroupNom.classList.add('form-group');
        const labelNom = document.createElement('label');
        labelNom.setAttribute('for', `nom_produit_${articleCount}`);
        labelNom.textContent = `Nom du produit ${articleCount}`;
        const inputNom = document.createElement('input');
        inputNom.setAttribute('type', 'text');
        inputNom.setAttribute('name', 'nom_produit[]');
        inputNom.setAttribute('id', `nom_produit_${articleCount}`);
        inputNom.classList.add('form-control');
        inputNom.setAttribute('required', true);

        const formGroupQuantite = document.createElement('div');
        formGroupQuantite.classList.add('form-group');
        const labelQuantite = document.createElement('label');
        labelQuantite.setAttribute('for', `quantité_${articleCount}`);
        labelQuantite.textContent = 'Quantité';
        const inputQuantite = document.createElement('input');
        inputQuantite.setAttribute('type', 'number');
        inputQuantite.setAttribute('name', 'quantité[]');
        inputQuantite.setAttribute('id', `quantité_${articleCount}`);
        inputQuantite.classList.add('form-control');
        inputQuantite.setAttribute('required', true);

        const formGroupPrixUnitaire = document.createElement('div');
        formGroupPrixUnitaire.classList.add('form-group');
        const labelPrixUnitaire = document.createElement('label');
        labelPrixUnitaire.setAttribute('for', `prix_unitaire_${articleCount}`);
        labelPrixUnitaire.textContent = 'Prix Unitaire';
        const inputPrixUnitaire = document.createElement('input');
        inputPrixUnitaire.setAttribute('type', 'number');
        inputPrixUnitaire.setAttribute('step', '0.01');
        inputPrixUnitaire.setAttribute('name', 'prix_unitaire[]');
        inputPrixUnitaire.setAttribute('id', `prix_unitaire_${articleCount}`);
        inputPrixUnitaire.classList.add('form-control');
        inputPrixUnitaire.setAttribute('required', true);

        formGroupNom.appendChild(labelNom);
        formGroupNom.appendChild(inputNom);
        formGroupQuantite.appendChild(labelQuantite);
        formGroupQuantite.appendChild(inputQuantite);
        formGroupPrixUnitaire.appendChild(labelPrixUnitaire);
        formGroupPrixUnitaire.appendChild(inputPrixUnitaire);

        newArticle.appendChild(formGroupNom);
        newArticle.appendChild(formGroupQuantite);
        newArticle.appendChild(formGroupPrixUnitaire);
        // Barre noire épaisse
        const hr = document.createElement('hr');
        hr.style.borderTop = '6px solid black';
        hr.style.margin = '40px 0';
        newArticle.appendChild(hr);

        articlesContainer.appendChild(newArticle);
    }
</script>
@endsection
