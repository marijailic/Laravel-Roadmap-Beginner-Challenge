<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view("pages.home", compact("articles"));
    }

    public function about()
    {
        return view("pages.about");
    }
}
