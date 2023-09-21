<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $books = Book::paginate();

        return view('book.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * $books->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $book = new Book();
        return view('book.create', compact('categories', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Book::$rules);

        $book = Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Libro Creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $book = Book::find($id);

        return view('book.edit', compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate(Book::$rules);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Libro Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $book = Book::find($id)->delete();

        return redirect()->route('books.index')
            ->with('success', 'Libro Borrado');
    }
}
