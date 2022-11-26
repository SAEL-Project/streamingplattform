<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class WatchController extends Controller
{
    public function index($id)
    {
        $movie = Movie::find($id);
        return view("pages.watch")->with("movie", $movie);
    }
}
