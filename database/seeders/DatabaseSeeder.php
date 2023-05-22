<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Imports\BooksImport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@domain.com',
             'is_admin' => true,
             'password' => bcrypt("password")
         ]);
        $data = storage_path("default.xlsx");
        Excel::import(new CategoriesImport, $data);
        Excel::import(new BooksImport, $data);
    }
}
