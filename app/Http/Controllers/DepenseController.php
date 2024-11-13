<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depenses = Depense::orderBy('id', 'asc')->get();
        $totalPrix = $depenses->sum('prix_total');
        return view('depenses.index', compact('depenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('depenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nom_produit = $request->input('nom_produit');
        $quantité = $request->input('quantité');
        $prix_unitaire = $request->input('prix_unitaire');

        foreach ($nom_produit as $key => $value) {
            $depense = new Depense();
            $depense->nom_produit = $value;
            $depense->quantité = $quantité[$key];
            $depense->prix_unitaire = $prix_unitaire[$key];
            $depense->prix_total = $quantité[$key] * $prix_unitaire[$key];
            $depense->save();
        }


         // Réorganiser les IDs des depenses
         $this->reorganizeIds();

        return redirect()->route('depenses.index')->with('success', 'Dépense ajoutée avec succès.');
    }


    // Méthode pour réorganiser les IDs des depenses
    private function reorganizeIds()
    {
        $depenses = Depense::all();
        $counter = 1;
        foreach ($depenses as $depense) {
            $depense->id = $counter;
            $depense->save();
            $counter++;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        // Réorganiser les IDs des depense
        $this->reorganizeIds();

        return view('depenses.show', compact('depense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        // Réorganiser les IDs des depenses
        $this->reorganizeIds();
        
        return view('depenses.edit', compact('depense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depense $depense)
    {
        $request->validate([
            'nom_produit' => 'required|string|max:255',
            'quantité' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
        ]);

        $depense->update($request->all());

        // Réorganiser les IDs des depenses
        $this->reorganizeIds();

        return redirect()->route('depenses.index')->with('success', 'Dépense mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        $depense->delete();

        // Réorganiser les IDs des depenses
        $this->reorganizeIds();

        return redirect()->route('depenses.index')->with('success', 'Dépense supprimée avec succès.');
    }

    // fonction de recherche pour les dépenses

    
    public function search(Request $request)
    {
        $request->validate([
            'date_saisie' => 'required|date',
        ]);

        $dateRecherche = Carbon::parse($request->input('date_saisie'))->format('Y-m-d');
        $depenses = Depense::depensesParDate($dateRecherche);
        $totalPrix = $depenses->sum('prix_total');

        // Stocker la date de recherche et le total des prix dans la session
        session([
            'date_recherche' => $dateRecherche,
            'total_prix_recherche' => $totalPrix,
        ]);

        return view('depenses.index', compact('depenses', 'totalPrix'));
    }

    public function annulerRecherche()
    {
        // Supprimer la date de recherche et le total des prix de la session
        session()->forget(['date_recherche', 'total_prix_recherche']);

        // Rediriger vers la page d'index des dépenses
        return redirect()->route('depenses.index')->with('success', 'Recherche annulée avec succès.');
    }

    public function searchByMonth(Request $request)
    {
        $request->validate([
            'search_month' => 'required|date_format:Y-m',
        ]);

        $searchMonth = Carbon::parse($request->input('search_month'));
        $depenses = Depense::whereYear('created_at', $searchMonth->year)
            ->whereMonth('created_at', $searchMonth->month)
            ->get();
        $totalPrix = $depenses->sum('prix_total');

        // Stocker le mois de recherche et le total des prix dans la session
        session([
            'mois_recherche' => $searchMonth->format('Y-m'),
            'total_prix_mois' => $totalPrix,
        ]);

        return view('depenses.index', compact('depenses', 'totalPrix'));
    }

}
