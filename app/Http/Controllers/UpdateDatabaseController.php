<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\BooksImport;
use App\Imports\CategoriesImport;

class UpdateDatabaseController extends Controller
{
    public function upload_books(Request $request)
    {
        request()->validate([
            'data' => 'required|mimes:xlx,xlsx|max:2048'
        ]);
        $data = $request->file('data');
        Excel::import(new CategoriesImport, $data);
        Excel::import(new BooksImport, $data);
        return redirect()->route('book.index');
    }
    public function index()
    {
        return view("update");
    }
}
