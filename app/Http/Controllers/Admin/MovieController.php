<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieEditRequest;
use App\Http\Requests\MovieStoreRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index($id)
    {
        $movie = Movie::find($id);
        $categories = Category::all();
        return view("pages.admin.movies.edit")
            ->with("categories", $categories)
            ->with("movie", $movie);
    }

    public function edit($id, MovieEditRequest $request)
    {
        $movie = Movie::find($id);
        $movie->title = $request["title"];
        $movie->description = $request["description"];
        $movie->save();
        return redirect(RouteServiceProvider::HOME);
    }

    public function remove($id)
    {
        $movie = Movie::find($id);
        $categories = Category::all();
        return view("pages.admin.movies.remove")
            ->with("categories", $categories)
            ->with("movie", $movie);
    }

    public function delete($id)
    {
        $movie = Movie::find($id);
        $video = $movie->absoluteVideoURL();
        $thumbnail = $movie->absoluteThumbnailURL();

        File::delete($video, $thumbnail);
        $movie->delete();
        return redirect(RouteServiceProvider::HOME);
    }

    public function create($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view("pages.admin.movies.create")
            ->with("categories", $categories)
            ->with("category", $category);
    }

    public function store($id, MovieStoreRequest $request)
    {
        $video = $request->file("video");
        $thumbnail = $request->file("thumbnail");

        $movie = new Movie;
        $movie->category_id = $id;
        $movie->title = $request["title"];
        $movie->description = $request["description"];
        $movie->save();

        $video->storeAs("assets/videos", "$id" . "-" . "$movie->id.mp4", "movies");
        $thumbnail->storeAs("assets/thumbnails", "$id" . "-" . "$movie->id.png", "movies");
        return redirect(RouteServiceProvider::HOME);
    }
}
