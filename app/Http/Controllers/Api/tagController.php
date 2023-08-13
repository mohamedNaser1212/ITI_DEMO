<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
class tagController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json([
            "message" => "All Books",
            "status_code" => 200,
            "data" => BookResource::collection($books)
        ]);
    }

    public function store(CreateBookRequest $request)
    {
        $fileName = Book::uploadFile($request, $request->pic);
        $book = Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "description" => $request->description,
            "cat_id" => $request->category,
            "pic" => $fileName
        ]);
        return response()->json([
            "message" => "Book Created",
            "status_code" => 201,
            "data" => $book
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json([
            "message" => "Book Found",
            "status_code" => 200,
            "data" => new BookResource($book)
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'price' => $request->price
        ]);
        return response()->json([
            "message" => "Book Updated",
            "status_code" => 200,
            "data" => $book
        ]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json([
            "message" => "Book Deleted",
            "status_code" => 200,
            "data" => []
        ]);
    }
}
