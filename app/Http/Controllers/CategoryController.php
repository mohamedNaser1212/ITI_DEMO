<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        $page = "Categories";

        return view('categories.index', [
            "page" => $page,
            "categories" => $categories
        ]);
    }

    public function create()
    {
        $page = "Create Category";

        return view('categories.create', ['page' => $page]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
