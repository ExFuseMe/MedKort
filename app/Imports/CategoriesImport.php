<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(Category::where("title", "=", $row[2])->count() == 0){
            return new Category([
                'title' => $row[2]
            ]);
        }

    }
}
