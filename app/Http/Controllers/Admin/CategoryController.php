<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Providers\RouteServiceProvider;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view("pages.admin.categories.edit")
            ->with("categories", $categories)
            ->with("category", $category);
    }

    public function edit($id, CategoryEditRequest $request)
    {
        $category = Category::find($id);
        $category->name = $request["name"];
        $category->save();
        return redirect(RouteServiceProvider::HOME);
    }

    public function remove($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view("pages.admin.categories.remove")
            ->with("categories", $categories)
            ->with("category", $category);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        foreach ($category->movies()->get() as $movie) {
            $movie->delete();
        }

        $category->delete();
        return redirect(RouteServiceProvider::HOME);
    }

    public function create()
    {
        $categories = Category::all();
        return view("pages.admin.categories.create")->with("categories", $categories);
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new Category;
        $category->name = $request["name"];
        $category->save();
        return redirect(RouteServiceProvider::HOME);
    }
}
