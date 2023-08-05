<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('main');
})->name('main');
Route::get('/books', function () {
    $books = [
        [
            "title" => 1980,
            "price" => 50
        ],
        [
            "title" => "Laravel",
            "price" => 100
        ],
        [
            "title" => "Vue",
            "price" => 100
        ],
        [
            "title" => "Vudase",
            "price" => 1020
        ],
    ];
    $page = "Books";
    return view('books', [
        "page" => $page,
        "books" => $books
    ]);
})->name('books');
