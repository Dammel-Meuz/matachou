<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Méthode pour afficher toutes les catégories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Méthode pour afficher le formulaire de création de catégorie
    public function create()
    {
        return view('categories.create');
    }

    // Méthode pour enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload de l'image
        $imagePath = $request->file('image')->store('images');

        // Création de la catégorie
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->image = $imagePath;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Méthode pour afficher le formulaire d'édition de catégorie
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Méthode pour mettre à jour une catégorie
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Recherche de la catégorie à mettre à jour
        $category = Category::findOrFail($id);
        $category->name = $validatedData['name'];

        // Si une nouvelle image est téléchargée, mettre à jour l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }




    // Méthode pour supprimer une catégorie
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
