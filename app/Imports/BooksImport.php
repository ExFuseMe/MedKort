<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title' => $row[0],
            'author'=> $row[1],
            'category_id' => Category::where('title', $row[2])->get(['id'])->first()->id,
            "cover" => "default.png",
        ]);
    }
}
