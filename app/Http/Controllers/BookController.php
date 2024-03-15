<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $bookModel = new Book;
        $books = $bookModel->getBooks($request);
        $categories = Category::all();
        return view('index')->with('books', $books)->with('categories', $categories);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show')->with('book', $book);
    }

    public function create()
    {
        $categories = Category::all();
        return view('book.add')->with('categories', $categories);
    }

    public function store(StoreBookRequest $request)
    {
        $request->validated();
        $bookModel = new Book;
        $book = $bookModel->addBook($request);
        if (!$book) {
            return redirect()->back()->withErrors('book', 'There is internal problem when storing the data');
        }
        return redirect()->back()->with('success', 'Successfully add new book data');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $book = Book::find($id);
        return view('book.edit')->with('categories', $categories)
            ->with('book', $book);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $request->validated();
        $bookModel = Book::find($id);
        $new_book = $bookModel->editBook($request);
        if (!$new_book) {
            return redirect()->back()->withErrors('book', 'There is internal problem when updating the data');
        }
        return redirect()->back()->with('success', 'Successfully update the book data');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->deleteBook();
        return redirect()->back()->with('success', 'Successfully delete the data');
    }
}
