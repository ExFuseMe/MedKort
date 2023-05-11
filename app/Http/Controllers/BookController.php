<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }
    public function store(StoreRequest $request)
    {
        $validated_data = $request->validated();


        $book = new Book($validated_data);

        $files = $request->file("image");
        if ($files == null) {
            $book->cover = "default.png";
        } else {
            $name = $files->getClientOriginalName();
            $files->move('covers', $name);
            $book->cover = $name;
        }

        $book->save();
        return redirect()->route('book.index');
    }
    public function create()
    {
        return view('books.create');
    }
    public function show(Book $book){
        return view('books.edit', compact('book'));
    }
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('book.index');

    }
    public function update(UpdateRequest $request,Book $book)
    {
        $validated_data = $request->validated();

        $files = $request->file("image");
        if ($files == null) {
            $book->cover = "default.png";
        } else {
            $name = $files->getClientOriginalName();
            $files->move('covers', $name);
            $book->cover = $name;
        }

        $book->update($validated_data);
        return redirect()->route('book.index');
    }
}
