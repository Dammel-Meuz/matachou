<?php

// app/Http/Controllers/Controller.php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;


class Controller extends BaseController
{
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();
    return view('welcome', compact('categories'));
        return view('welcome', compact('articles'));
    }
}
