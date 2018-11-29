<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Carbon\Carbon;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::latest()->filter(request(['month', 'year']))->get();

        $archives = Book::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();


        return view('bookList', compact('books', 'archives'));
//        dd($books);
    }


    public function create()
    {

        return view('create');
    }


    public function store(Request $request)
    {

            $this->validate(request(), [
                'name' => 'required',
                'category' => 'required',
                'description' => 'required'
            ]);

        Book::create(request(['name', 'category', 'description']));

        return redirect('/books');
    }


    public function show(Book $book)
    {
        return view('book',['book' => $book]);
    }


    public function edit(Book $book)
    {
//        dd($book);
        return view('edit', ['book' => $book]);
    }


    public function update(Request $request, Book $book)
    {
        Book::create(request(['name', 'category', 'description']));

        return redirect('/books');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }
}
