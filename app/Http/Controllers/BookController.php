<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {
    
    public function index() {
        $books = Book::all();
        return view('books.index', ['items' => $books]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_stock' => 'required|integer|min:0',
            'book_date' => 'required|date'
        ]);
        
        Book::create([
            'book_name'   => $request->book_name,
            'book_author' => $request->book_author,
            'book_stock'  => $request->book_stock,
            'book_date'   => $request->book_date
        ]);
        
        return redirect('/books')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book) {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_stock' => 'required|integer|min:0',
            'book_date' => 'required|date'
        ]);
        
        $book->update([
            'book_name'   => $request->book_name,
            'book_author' => $request->book_author,
            'book_stock'  => $request->book_stock,
            'book_date'   => $request->book_date
        ]);
        
        return redirect('/books')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/books')->with('success', 'Book deleted successfully!');
    }
}
?>