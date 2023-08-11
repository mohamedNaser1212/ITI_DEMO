<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class BookController extends Controller
{
    // list
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        $page = "Books";
        return view('books', [
            "page" => $page,
            "books" => $books
        ]);
    }
    // view page of create

    public function create()
    {
        $page = "create book";
        $categories = Category::all();
        $tags = Tag::all();

        return view('create-book', ['page' => $page, 'categories' => $categories, 'tags' => $tags]);

    }
    // create
    public function store(CreateBookRequest $request)
    {

        $fileName = Book::uploadFile($request, $request->pic);
        $book = new Book();
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->cat_id = $request->input('category');
        $book->pic = $fileName;
        $book->save();
        $tags = $request->input('tags');
        $book->tags()->attach($tags);

        return redirect()->route('books.index');
    }

    public function show($book)
    {

            $book = Book::with('tags')->findOrFail($book);
            return view('view-page', compact('book'));

    }

    public function destroy($book)
    {
        $book = Book::find($book);
        $book->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        // Get book from database
        $book = Book::find($id);

        // Return view with book
        return view('update')->with('book', $book);
    }
    public function update(Request $request, $id)
    {
        // Get book from database
        $book = Book::find($id);

        // Update book
        $book->title = $request->title;
        $book->price = $request->price;
        $book->description = $request->description;

        // Save book
        $book->save();

        // Redirect to books.index
        return redirect()->route('books.show',$book->id);
    }

}
