<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;

class BrowseController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("pages.browse")->with("categories", $categories);
    }
}
