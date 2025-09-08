<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title')->get();
        return view('catalog.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with(['author', 'category', 'subcategory', 'language', 'publisher'])->findOrFail($id);
        return view('catalog.show', compact('book'));
    }
}
