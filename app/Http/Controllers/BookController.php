<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function store(Request $req)
    {
        $validated_data = $req->validate([
            'title' => 'string',
            'slug' => 'string',
            'author' => 'string',
            'description' => 'string',
            'rating' => '',
            'category_id' => 'Integer'
        ]);


        $book = new Book($validated_data);

        $files = $req->file("image");
        if ($files == null) {
            $book->cover = "default.webp";
        } else {
            $name = $files->getClientOriginalName();
            $files->move('covers', $name);
            $book->cover = $name;
        }

        $book->save();
        return redirect()->back();
    }
    public function create()
    {
        return view('books.create');
    }
    public function show(Book $book){
        return $book;
    }
    public function destroy(Book $book){
        $book->delete();
    }
}
