<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title'=>'string',
            'slug'=>'string']);
        $category = new Category($validated_data);
        $category->save();
        return redirect()->route('category.index');
    }
    public function create()
    {
        return view('categories.create');
    }
    public function show(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');

    }
    public function update(Request $request, Category $category)
    {
        $validated_data = $request->validate([
            'title'=>'string',
            'slug'=>'string']);
        $category->update($validated_data);
        return redirect()->route('category.index');
    }
}
