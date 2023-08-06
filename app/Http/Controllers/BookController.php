<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        return view('create-book', ['page' => $page]);
    }
    // create
    public function store(Request $request)
    {
        Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
        ]);
        return redirect()->route('books.index');
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);


        // Return view with book
        return view('view-page')->with('book', $book);
        // return view();// task
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
