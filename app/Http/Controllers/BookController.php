<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Publisher;

class BookController extends Controller
{
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $languages = Language::all();
        $publishers = Publisher::orderBy('name')->get();
        

        return view('books.create', compact('authors', 'categories', 'languages', 'publishers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:120',
            'isbn'       => 'required|string|max:20|unique:books',
            'author_id'  => 'required|exists:authors,author_id',
            'category_id'=> 'nullable|exists:categories,category_id',
            'lang_id'    => 'nullable|exists:languages,lang_id',
            'publishers_id'=> 'required|exists:publishers,publishers_id',
            'pages'      => 'nullable|integer|min:1',
            'year_pub'   => 'nullable|integer|min:1000|max:3000',
            'description'=> 'nullable|string',
        ]);

        Book::create([
            'title'       => $request->title,
            'isbn'        => $request->isbn,
            'author_id'   => $request->author_id,
            'category_id' => $request->category_id,
            'lang_id'     => $request->lang_id,
            'publishers_id' => $request->publishers_id,
            'pages'       => $request->pages,
            'year_pub'    => $request->year_pub,
            'description' => $request->description,
        ]);

        return redirect()->route('catalog')->with('success', 'Libro agregado correctamente.');
        return redirect()->route('books.create')->with('status', 'Libro guardado correctamente.');
        return redirect()->back()->with('error', 'No se pudo guardar el libro. Inténtalo de nuevo.');
    }
}