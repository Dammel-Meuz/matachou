<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Article;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('client', 'articles')->paginate(5);
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
    $clients = Client::all();
    $articles = Article::all();
    return view('commandes.create', compact('clients', 'articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'articles' => 'required|array',
            'articles.*.article_id' => 'required|exists:articles,id',
            'articles.*.quantite' => 'required|integer|min:1',
            'adresse_livraison' => 'required|string',
        ]);

        $commande = Commande::create([
            'client_id' => $request->client_id,
            'prix_total' => 0, // Calculer plus tard
            'etat' => Commande::ETAT_EN_ATTENTE,
            'adresse_livraison' => $request->adresse_livraison,
        ]);

        $prix_total = 0;
        foreach ($request->articles as $articleData) {
            $article = Article::find($articleData['article_id']);
            $commande->articles()->attach($article->id, ['quantite' => $articleData['quantite']]);
            $prix_total += $article->price * $articleData['quantite'];
        }

        $commande->update(['prix_total' => $prix_total]);

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    public function show(Commande $commande)
    {
        return view('commandes.show', compact('commande'));
    }

    public function edit(Commande $commande)
    {
        $clients = Client::all();
        $articles = Article::all();
        return view('commandes.edit', compact('commande', 'clients', 'articles'));
    }

    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'articles' => 'required|array',
            'articles.*.article_id' => 'required|exists:articles,id',
            'articles.*.quantite' => 'required|integer|min:1',
            'adresse_livraison' => 'required|string',
            'etat' => 'required|in:en attente,en cours,livré',
        ]);

        $commande->update([
            'client_id' => $request->client_id,
            'adresse_livraison' => $request->adresse_livraison,
            'etat' => $request->etat,
        ]);

        $commande->articles()->detach();
        $prix_total = 0;
        foreach ($request->articles as $articleData) {
            $article = Article::find($articleData['article_id']);
            $commande->articles()->attach($article->id, ['quantite' => $articleData['quantite']]);
            $prix_total += $article->price * $articleData['quantite'];
        }

        $commande->update(['prix_total' => $prix_total]);

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function updateStatus(Request $request, Commande $commande)
{
    $request->validate([
        'etat' => 'required|in:en attente,en cours,livré',
    ]);

    $commande->etat = $request->etat;
    $commande->save();

    return redirect()->route('commandes.index')->with('success', 'État de la commande mis à jour avec succès.');
}


    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}
