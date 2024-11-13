<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Models\Commande;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    public function index()
    {
        // Récupérer tous les livreurs
        $livreurs = Livreur::all();

        // Passer les livreurs à la vue
        return view('livreurs.index', compact('livreurs'));
    }

    public function create()
    {
        $commandes = Commande::all(); // Récupérer toutes les commandes
        return view('livreurs.create', compact('commandes')); // Passer les commandes à la vue
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'disponibilite' => 'required|string|in:disponible,occupe',
        ]);

        // Créer un nouveau livreur
        $livreur = new Livreur;
        $livreur->nom = $validatedData['nom'];
        $livreur->telephone = $validatedData['telephone'];
        $livreur->disponibilite = $validatedData['disponibilite'];
        $livreur->save();

        // Réorganiser les IDs des livreurs
        $this->reorganizeIds();

        return redirect()->route('livreurs.index')->with('success', 'Livreur ajouté avec succès.');

    }

    // Méthode pour réorganiser les IDs des livreurs
    private function reorganizeIds()
    {
        $livreurs = Livreur::all();
        $counter = 1;
        foreach ($livreurs as $livreur) {
            $livreur->id = $counter;
            $livreur->save();
            $counter++;
        }
    }

    public function show(Livreur $livreur)
    {
        // Réorganiser les IDs des livreurs
        $this->reorganizeIds();

        return view('livreurs.show', compact('livreur'));
    }

    public function edit(Livreur $livreur)
    {
        $commandes = Commande::all(); // Récupérer toutes les commandes
        return view('livreurs.edit', compact('livreur')); // Passer le livreur et les commandes à la vue
    }

    public function update(Request $request, Livreur $livreur)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'disponibilite' => 'required|string|in:disponible,occupe',
        ]);

        // Mettre à jour le livreur avec les nouvelles données
        $livreur->update($validatedData);

        return redirect()->route('livreurs.index')->with('success', 'Livreur mis à jour avec succès.');
    }

    public function destroy(Livreur $livreur)
    {
        $livreur->delete();

        // Réorganiser les IDs des livreurs
        $this->reorganizeIds();

        return redirect()->route('livreurs.index');
    }
}
